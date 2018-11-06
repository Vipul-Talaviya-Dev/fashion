<?php

namespace App\Http\Controllers\User;

use Mail;
use Auth;
use Session;
use App\Models\User;
use App\Models\Address;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index($mainCategory, $subCategory, $thirdCategory, Request $request)
    {
    	$products = new Product;
    	$category = new Category;	
    	if($thirdCategory == 'all') {
    		$category = $category->where('slug', $subCategory)->first(); 
    	} else {
			$category = $category->where('slug', $thirdCategory)->first(); 
    	}
		$products = $products->with(['category.parent.parent'])->where('category_id', $category->id)->get();

        return view('user.product-list', [
        	'products' => $products
        ]);
    }

    public function productDetail($mainCategory, $subCategory, $thirdCategory, $productUrl, Request $request)
    {
    	// Session::flush('cart');
    	// Session::forget('cart');
    	if(!$product = Product::with(['variations.color'])->where('slug', $productUrl)->first()) {
    		return redirect()->back();
    	}
    	$categoryIds = Category::whereIn('slug', [$subCategory, $thirdCategory])->get()->pluck('id')->toArray();
    	$relatedProducts = Product::with(['variations.color', 'variations.size'])->whereIn('category_id', $categoryIds)->inRandomOrder()->limit(15)->get();

    	return view('user.product-detail', [
    		'product' => $product,
    		'relatedProducts' => $relatedProducts
    	]);
    }

    public function addToCard(Request $request)
    {
    	// Remove Cart Item
    	if($request->get('removeCartId')) {
    		$cartItems = Session::get('cart');
    		foreach($cartItems as $k => $cart)
			{
				if($cart['cart_id'] == $request->get('removeCartId'))
				{	
					unset($cartItems[$k]);
				}
			}
			Session::put('cart', array_values($cartItems));
			return response()->json([
	            'status' => true,
	            'totalItem' => ((Session::get('cart') =="") ? 0 : count(Session::get('cart')))
	        ]);
    	}

    	$productId = $request->get('product_id');
    	$variationId = $request->get('variation_id');
    	if($productId == "" || $variationId == "") {
    		return response()->json([
	            'status' => false,
	            'error' => 'Required Field'
	        ]);
    	}
    	$count = 0;
    	if(Session::get('cart') != "") {
    		$count = count(Session::get('cart')) + 1;
    		$new_cart_id = "FHSCART_".$count;
    		foreach(Session::get('cart') as $cartItems) {
				if($cartItems['cart_product_id'] == $productId && $cartItems['variation_id'] == $variationId) {
					return response()->json([
			            'status' => false,
			            'error' => 'Already Added For This Product..'
			        ]);
					exit(); // If Product Id Already Exist then Exit	
				}	
			}
			$items = array("cart_id" => $new_cart_id,"cart_product_id" => $productId,"variation_id" => $variationId);
			Session::push('cart', $items);
    	} else {
    		// if session doesn't exist - create one
    		$items[] = array("cart_id" => "FHSCART_1" ,"cart_product_id" => $productId, "variation_id" => $variationId);
    		Session::put('cart', $items);
    	}	

    	// For Basket Counting // 
    	return response()->json([
            'status' => true,
            'totalItem' => ((Session::get('cart') =="") ? 0 : count(Session::get('cart')))
        ]);
    }

    public function cart()
    {
    	if(Session::get('cart') == null) {
    		return redirect(route('user.index'));
    	}
    	return view('user.cart');
    }

    public function cartOrderDetail(Request $request)
    {
    	if($request->get('product_id') == "" || $request->get('product_qty') == "") {
    		return response()->json([
	            'status' => false,
	            'error' => 'Required Field'
	        ]);
    	}

    	$qty 			= $request->get('product_qty');
		$total		 	= $request->get('total');
		$final_amount  	= $request->get('finalamount');
		$product_id		= $request->get('product_id');
		$variation_id	= $request->get('variation_id');
		$orders = array();
		for($i = 0; $i<count($product_id); $i++) {
			$orders['product'][] = array("product_id" => $product_id[$i],"qty" => $qty[$i],"variation_id" =>$variation_id[$i]);
		}
		$orders['total'] = $total;
		$orders['final_amount'] = $final_amount;
		Session::put('CART_AMOUNT', $final_amount);
		Session::put('order', $orders);

		// For Basket Counting // 
    	return response()->json([
            'status' => true,
            'order' => ((Session::get('order') =="") ? 0 : count(Session::get('order')))
        ]);
    }

    public function orderShipping()
    {
    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}

    	return view('user.order-shipping');
    }

    public function shippingDetail(Request $request)
    {
    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}

    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'mobile' => 'required|numeric|digits_between:10,12',
    		'address' => 'required',
    		'pincode' => 'required|numeric|digits:6',
    		'city' => 'required|alpha',
    		'state' => 'required|alpha',
    		// 'country' => 'required|alpha',
    	]);

    	if($user = User::where('email', $request->get('email'))->first()) {
            $address = Address::create([
                'user_id' => $user->id,
                'name' => $request->get('name'),
                'mobile' => $request->get('mobile'),
                'address' => $request->get('address'),
                'pincode' => $request->get('pincode'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'country' => $request->get('country') ?: 'India',
                'default' => 1,
            ]);
    		Auth::login($user);
    	} else {
	    	$user = User::create([
	    		'name' => $request->get('name'),
	    		'email' => $request->get('email'),
	    		'mobile' => $request->get('mobile'),
	    		'password' => \Hash::make('123456'),
	    		'referral_code' => User::referralCode(),
	    	]);

	    	$address = Address::create([
	    		'user_id' => $user->id,
	    		'name' => $request->get('name'),
	    		'mobile' => $request->get('mobile'),
	    		'address' => $request->get('address'),
	    		'pincode' => $request->get('pincode'),
	    		'city' => $request->get('city'),
	    		'state' => $request->get('state'),
	    		'country' => $request->get('country') ?: 'India',
	    		'default' => 1,
	    	]);

	    	Auth::login(User::find($user->id));
    	}

    	return redirect(route('user.payment'));
    }

    public function payment()
    {
    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}
    	$user = Auth::user();
    	$address = Address::where('user_id', $user->id)->first();
    	return view('user.payment', [
    		'user' => $user,
    		'address' => $address,
    	]);
    }

    public function orderPlace(Request $request)
    {
    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}

        $user = Auth::user();

        $order = new Order;
        $order->user_id = $user->id;
        if(Session::get('voucher')) {
        	$order->voucher_id = Session::get('voucher');
        }
        if(Session::get('offer')) {
        	$order->offer_id = Session::get('offer');
        }

        $order->payment_mode = 1;
        $order->payment_status = 1;
        $order->cart_amount = Session::get('order')['total'];
        $order->discount = Session::get('discount') ?: 0;
        // $order->extra_discount = $request->get('data');
        $order->total = Session::get('order')['final_amount'];
        $order->status = 1;
        $order->save();
        
        $orderId = $order->id;
        foreach(Session::get('order')['product'] as $key => $data) {
        	$product = Product::find($data['product_id']);
			$variation = $product->variations()->find($data['variation_id']);

			$orderProduct = new OrderProduct;
	        $orderProduct->order_id = $order->id;
	        $orderProduct->user_id = $user->id;
	        $orderProduct->product_id = $product->id;
	        $orderProduct->variation_id = $variation->id;
	        $orderProduct->price = $product->price;
	        $orderProduct->max_price = $product->max_price;
	        $orderProduct->qty = $data['qty'];
	        $orderProduct->status = 1;
	        $orderProduct->save();
        }

    	Session::forget('cart');
    	Session::forget('order');
    	Session::forget('voucher');
    	Session::forget('offer');

    	Session::put('orderId', $orderId);
        return redirect(route('user.thanks'));
    }

    public function thanks(Request $request)
    {
    	if(Session::get('orderId') == null) {
    		return redirect(route('user.index'));
    	}
        $order = Order::with(['orderProducts.product'])->find(Session::get('orderId'));
        $user = Auth::user();
        $address = Address::where('user_id', $user->id)->first();

        Mail::send('user.email.order-place', [
            'order' => $order,
            'user' => $user,
            'address' => $address
        ], function ($message) use ($user) {
            $message->from('vipulpatel1152@gmail.com', 'Developer Mail')
                ->subject('Order Placed')
                ->to($user->email, $user->name);
        });

        Session::forget('orderId');

    	return view('user.thanks', [
    		'order' => $order,
            'user' => $user,
            'address' => $address,
    	]);
    }
}
<?php

namespace App\Http\Controllers\User;

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
    	// if(Session::get('order') == null) {
    	// 	return redirect(route('user.index'));
    	// }
    	return view('user.order-shipping');
    }

    public function shippingDetail(Request $request)
    {
    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}

    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email|unique:users,email',
    		'mobile' => 'required|numeric|digits_between:10,12',
    		'address' => 'required',
    		'pincode' => 'required|numeric|digits:6',
    		'city' => 'required|alpha',
    		'state' => 'required|alpha',
    		'country' => 'required|alpha',
    	]);

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
    		'country' => $request->get('country'),
    		'default' => 1,
    	]);

    	Session::put("user", User::find($user->id));

    	return redirect(route('user.payment'));
    }

    public function orderPlace(Request $request)
    {
        
        $order = new Order;
        $order->user_id = $request->get('data');
        $order->voucher_id = $request->get('data');
        $order->offer_id = $request->get('data');
        $order->payment_mode = $request->get('data');
        $order->payment_status = $request->get('data');
        $order->payment_reference = $request->get('data');
        $order->cart_amount = $request->get('data');
        $order->discount = $request->get('data');
        $order->extra_discount = $request->get('data');
        $order->total = $request->get('data');
        $order->status = 1;
        // $order->save();
        
        $orderProduct = new OrderProduct;
        $orderProduct->order_id = $request->get('data');
        $orderProduct->user_id = $request->get('data');
        $orderProduct->product_id = $request->get('data');
        $orderProduct->variation_id = $request->get('data');
        $orderProduct->price = $request->get('data');
        $orderProduct->max_price = $request->get('data');
        $orderProduct->qty = $request->get('data');
        $orderProduct->status = 1;
        // $orderProduct->save();
    }
}

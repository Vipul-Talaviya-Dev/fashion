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
use App\Models\Variation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('user.product-list', [
        	'products' => Product::latest()->with(['variation', 'category.parent'])->paginate(15)
        ]);
    }

    public function productDetail($mainCategory, $subCategory, $thirdCategory, $productUrl, Request $request)
    {
        // Session::flush('cart');
        // Session::forget('cart');
        if(!$product = Product::with(['variations.color', 'variations.size'])->where('slug', $productUrl)->first()) {
            return redirect()->back();
        }

        $categoryIds = Category::whereIn('slug', [$subCategory, $thirdCategory])->get()->pluck('id')->toArray();
        $relatedProducts = Product::with(['variation', 'category'])->whereIn('category_id', $categoryIds)->inRandomOrder()->limit(15)->get();

        return view('user.product-detail', [
            'product' => $product,
            'variation' => $product->variation,
            'colorVariations' => Variation::with(['color'])->where('product_id', $product->id)->groupBy('color_id')->get(),
            'sizeVariations' => Variation::with(['size'])->where('color_id', $product->variation->color_id)->where('product_id', $product->id)->get(),
            'relatedProducts' => $relatedProducts,
            'url' => '/shop/'.$mainCategory.'/'.$subCategory.'/'.$thirdCategory.'/'.$productUrl
        ]);
    }
    
    public function productDetailWithColor($mainCategory, $subCategory, $thirdCategory, $productUrl, $id, $code, Request $request)
    {
    	if(!$product = Product::with(['variation.color', 'variation.size'])->where('slug', $productUrl)->first()) {
    		return redirect()->back();
    	}
        $variation = $product->variations()->find(base64_decode($id));
        
    	$categoryIds = Category::whereIn('slug', [$subCategory, $thirdCategory])->get()->pluck('id')->toArray();
    	$relatedProducts = Product::with(['variation', 'category'])->whereIn('category_id', $categoryIds)->inRandomOrder()->limit(15)->get();

    	return view('user.product-detail', [
    		'product' => $product,
            'variation' => $variation,
            'colorVariations' => Variation::with(['color'])->where('product_id', $product->id)->groupBy('color_id')->get(),
            'sizeVariations' => Variation::with(['size'])->where('color_id', $variation->color_id)->where('product_id', $product->id)->get(),
    		'relatedProducts' => $relatedProducts,
            'url' => '/shop/'.$mainCategory.'/'.$subCategory.'/'.$thirdCategory.'/'.$productUrl
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
        Session::put('redirect', route('user.orderShipping'));
        if (!\Auth::check()) {
            return redirect(route('user.loginForm'));
        }
        $user = Auth::user();

    	return view('user.order-shipping', [
            'addresses' => $user->addresses
        ]);
    }

    public function shippingDetail(Request $request)
    {
    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}
        $user = Auth::user();
        
        if($request->get('addressOption') == "") {
            return redirect()->back()->with(['error' => 'Select Your Address...']);
        }

        Session::put('addressId', $request->get('addressOption'));
    	return redirect(route('user.payment'));
    }

    public function payment()
    {
    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}
    	$user = Auth::user();
    	$address = $user->addresses()->find(Session::get('addressId'));

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
        $order->address_id = Session::get('addressId');
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
	        $orderProduct->price = $variation->price;
	        $orderProduct->max_price = $variation->price;
	        $orderProduct->qty = $data['qty'];
	        $orderProduct->status = 1;
	        $orderProduct->save();

            $variation->qty = $variation->qty - $data['qty'];
            $variation->save();
        }

    	Session::forget('cart');
    	Session::forget('order');
    	Session::forget('voucher');
        Session::forget('offer');
    	Session::forget('addressId');

    	Session::put('orderId', $orderId);
        return redirect(route('user.thanks'));
    }

    public function thanks(Request $request)
    {
    	if(Session::get('orderId') == null) {
    		return redirect(route('user.index'));
    	}
        $order = Order::with(['orderProducts.product.variations'])->find(Session::get('orderId'));
        $user = Auth::user();
        $address = $user->addresses()->find($order->address_id);

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
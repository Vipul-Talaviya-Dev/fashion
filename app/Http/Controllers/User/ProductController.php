<?php

namespace App\Http\Controllers\User;

use Mail;
use Auth;
use Session, Cookie;
use Carbon\Carbon;
use Validator;
use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use App\Models\AppContent;
use App\Models\Address;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Category;
use App\Models\Order;
use App\Models\Offer;
use App\Models\OrderProduct;
use App\Models\Variation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function mail()
    {
        Mail::send('user.email.member-ship-email', [
            'user' => User::find(1),
        ], function ($message) {
            $message->from('support@shroud.in', 'Support')
                ->subject('Order Placed')
                ->to("vipulpatel1152@gmail.com", "vipul patel");
        });
        dd('df');
    }
    public function index(Request $request)
    {

        $variations = Variation::with(['product.category.parent'])->latest()->groupBy('color_id')->groupBy('product_id');

        if($request->get('sizes')) {
            $variations = $variations->whereIn('size_id', explode(',', $request->get('sizes')));
        }

        if($request->get('colors')) {
            $variations = $variations->whereIn('color_id', explode(',', $request->get('colors')));
        }

        if($request->get('prices')) {
            $price = explode(';', $request->get('prices'));
            $from = isset($price[0]) ? ($price[0]*100) : 0; 
            $to = isset($price[1]) ? ($price[1]*100) : 100000; 

            $variations = $variations->where('price', '>=', $from)->where('price', '<=', $to);
        }

        if($request->get('types')) {
            $types = explode(',', $request->get('types'));
            $variations = $variations->whereRaw("find_in_set('".$types[0]."', product_type_id)");
            foreach ($types as $key => $type) {
                if($key != 0) {
                    $variations = $variations->OrWhereRaw("find_in_set('".$type."', product_type_id)");
                }
            }
            
            // $variations = $variations->where('product_type_id', explode(',', $request->get('types')));
        }
        return view('user.product-list', [
        	'variations' => $variations->paginate(9),
            'sizes' => Size::active()->get(),
            'colors' => Color::active()->get(),
            'types' => ProductType::active()->get(),
            'cart' => true,
            'footer' => true
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
            'url' => '/shop/'.$mainCategory.'/'.$subCategory.'/'.$thirdCategory.'/'.$productUrl,
            'cart' => true,
            'footer' => true
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
            'url' => '/shop/'.$mainCategory.'/'.$subCategory.'/'.$thirdCategory.'/'.$productUrl,
            'cart' => true,
            'footer' => true
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
			            'error' => 'This product is already added.'
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
    	return view('user.cart', [
            'cart' => false,
            'footer' => false
        ]);
    }

    public function carts()
    {
        $deliverCharge = AppContent::find(1);
        return view('user.carts', ['deliverCharge' => $deliverCharge->delivery_charge,]);
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
		Session::put('discount', 0);
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
        Cookie::queue(
            Cookie::forget('userCloseModel')
        );

        $user = Auth::user();
        $deliverCharge = AppContent::find(1);
    	return view('user.order-shipping', [
            'addresses' => $user->addresses,
            'deliverCharge' => $deliverCharge->delivery_charge,
            'cart' => false,
            'footer' => true
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
        $content = AppContent::find(1);

    	return view('user.payment', [
    		'user' => $user,
    		'address' => $address,
            'deliverCharge' => $content->delivery_charge,
            'content' => $content,
            'cart' => false,
            'footer' => true
    	]);
    }
    /**
     * [memberShipCodeCheck User]
     * @param  Request $request [code]
     * @return [type]           [description]
     */
    public function memberShipCodeCheck(Request $request)
    {
        if(!$memberCode = User::where('member_ship_code', $request->get('code'))->first()) {
            return response()->json([
                'status' => false,
                'error' => 'Invalid MemberShip Code...'
            ]);
        }

        // if(Session::get('CART_AMOUNT') >= 2000) {
            $discount = round(Session::get('CART_AMOUNT')*20/100);
            Session::put('discount', $discount);
            Session::put('offer', 0);
            Session::put('discountPercentage', 20);
            
            return response()->json([
                'status' => true,
                'success' => 'Successfully Apply Your MemberShip Code!!!'
            ]);
        // }

        return response()->json([
            'status' => false,
            'error' => 'You do not Get Discount'
        ]);

    }

    /**
     * [offer code apply]
     * @param  Request $request [code]
     * @return [type]           [description]
     */
    public function promotionApply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code'=> 'required|exists:offers,offer_code',
        ]);
        $user = Auth::user();
        if ($validator->fails()) {
            $error = $validator->errors()->all(':message');
            $response = [
                'status' => false,
                'error' => $error[0],
            ];
        } else {
            if(!$offer = Offer::active()->where('start_date', '<=', Carbon::now()->toDateString())->where('end_date', '>=', Carbon::now()->toDateString())->where('offer_code', $request->get('code'))->first()) {
                return $response = [
                    'status' => false,
                    'error' => "Promotion code has been expired.",
                ];
            }

            // Use One Time Or Multiple Time
            if($offer->use_time == 2) {
                if(Order::where('user_id', $user->id)->where('offer_id', $offer->id)->first()) {
                    return $response = [
                        'status' => false,
                        'error' => "Promotion code has been used already.",
                    ];
                }
            }
            // Only Use Member
            if($offer->use_member) {
                if($user->member_ship_code == null) {
                    return $response = [
                        'status' => false,
                        'error' => "Promotion code use only shroud member.",
                    ];   
                }
            }

            // $amount_limit = $offer->amount_limit;
            $discount = 0;
            $totalAmount = Session::get('CART_AMOUNT');
            // get Discount
            if($offer->discount) {
                $discount = ($totalAmount*$offer->discount)/100;
            }

            // Check discount
            if ((int)$discount >= (int)$totalAmount) {
                $discount = 0; // Discount 0
            } else {
                // Get amount
                /*if($offer->amount) {
                    if(($totalAmount-$offer->amount) < $totalAmount) {
                        $discount = $offer->amount;
                    }
                }*/
            }   
            
            Session::put('discount', round($discount)); // discount amount
            Session::put('offer', $offer->id);
            Session::put('discountPercentage', $offer->discount); //discount percentage

            $response = [
                'status' => true,
                'success' => "Apply Your Promotion Code Successfully.",
            ];
        }
        return $response;
    }

    public function orderPlace(Request $request)
    {
        Cookie::queue(
            Cookie::forget('userCloseModel')
        );

    	if(Session::get('order') == null) {
    		return redirect(route('user.index'));
    	}
        // Check qty
        foreach(Session::get('order')['product'] as $key => $data) {
            $checkProduct = Variation::where('product_id', $data['product_id'])->where('id', $data['variation_id'])->first();
            if($checkProduct->qty == 0) {
                Session::forget('cart');
                Session::forget('discount');
                Session::forget('CART_AMOUNT');
                Session::forget('order');
                Session::forget('voucher');
                Session::forget('offer');
                Session::forget('addressId');

                return redirect(route('user.index'))->with(['error' => $checkProduct->product->name." Out of stock, please select other product"]);
            }
        }

        $user = Auth::user();
        $deliverCharge = AppContent::find(1);
        $order = new Order;
        $order->user_id = $user->id;
        $order->address_id = Session::get('addressId');
        if(Session::get('voucher')) {
        	$order->voucher_id = Session::get('voucher');
        }
        if(Session::get('offer')) {
        	$order->offer_id = Session::get('offer');
        }

        $order->payment_mode = $request->get('payment_option') ? $request->get('payment_option') : 2;
        $order->payment_status = 1;
        $order->cart_amount = round((Session::get('order')['final_amount'] - Session::get('discount')) + $deliverCharge->delivery_charge);
        $order->discount = Session::get('discountPercentage') ?: 0;
        $order->discount_amount = round(Session::get('discount')) ?: 0;
        // $order->extra_discount = $request->get('data');
        $order->total = round((Session::get('order')['final_amount']) + $deliverCharge->delivery_charge);
        $order->delivery_charge = $deliverCharge->delivery_charge;
        $order->status = ($request->get('payment_option') == 1) ? 3 : 1;
        $order->save();
        
        $orderId = $order->id;
        foreach(Session::get('order')['product'] as $key => $data) {
        	$product = Product::find($data['product_id']);
			$variation = $product->variations()->find($data['variation_id']);

            for($i=0;$i<$data['qty'];$i++) {
    			$orderProduct = new OrderProduct;
    	        $orderProduct->order_id = $order->id;
    	        $orderProduct->user_id = $user->id;
    	        $orderProduct->product_id = $product->id;
    	        $orderProduct->variation_id = $variation->id;
    	        $orderProduct->purchase_price = $variation->purchase_price;
                $orderProduct->price = $variation->price;
    	        $orderProduct->max_price = $variation->price;
    	        $orderProduct->qty = 1;
                // $orderProduct->qty = $data['qty'];
                $orderProduct->status = ($request->get('payment_option') == 1) ? 3 : 1;
    	        // $orderProduct->payment_status = ($request->get('payment_option') == 1) ? 2 : 1;
    	        $orderProduct->save();

                $variation->qty = $variation->qty - 1;
                // $variation->qty = $variation->qty - $data['qty'];
                $variation->save();
            }
        }

        Session::forget('cart');
        Session::forget('discount');
    	Session::forget('CART_AMOUNT');
    	Session::forget('order');
    	Session::forget('voucher');
        Session::forget('offer');
    	Session::forget('addressId');

    	Session::put('orderId', $orderId);
        if($request->get('payment_option') == 1) {
            return redirect(route('user.thanks'));
        } else {
            return redirect(route('user.orderConfirm'));
        }
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
            $message->from('support@shroud.in', 'Support')
                ->subject('Order Placed')
                ->to($user->email, $user->name);
        });

        Session::forget('orderId');

        return view('user.thanks', [
            'order' => $order,
            'user' => $user,
            'address' => $address,
            'cart' => false,
            'footer' => true
        ]);
    }
}
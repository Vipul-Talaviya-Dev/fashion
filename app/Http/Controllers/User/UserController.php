<?php

namespace App\Http\Controllers\User;

use Mail;
use Auth;
use Session;
use Validator;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$orders = Order::latest()->with(['orderProducts.variation'])->where('user_id', $user->id)->get();
    	return view('user.my-account', [
    		'orders' => $orders,
            'cart' => true,
            'footer' => true
    	]);
    }

    public function profile()
    {
        $user = Auth::user();
        $name = explode(' ', $user->name);
        return view('user.my-profile', [
            'addresses' => $user->addresses,
            'user' => $user,
            'fname' => $name[0],
            'lname' => isset($name[1]) ? $name[1] : '',
            'cart' => true,
            'footer' => true
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'mobile' => 'required|numeric',
            'birth_date' => 'required|date_format:d-m-Y',
            'anniversary_date' => 'nullable|date_format:d-m-Y',
        ]);

        $user = Auth::user();

        $user->name = $request->get('firstName').' '.$request->get('lastName');
        $user->mobile = $request->get('mobile');
        $user->birth_date = date('Y-m-d', strtotime($request->get('birth_date')));
        $user->anniversary_date = $request->get('anniversary_date') ? date('Y-m-d', strtotime($request->get('anniversary_date'))) : NULL;
        $user->save();

        return redirect()->back()->with(['success' => 'Profile Updated Successfully..']);
    }

    public function getMemberShip()
    {
        $user = Auth::user();
        $user->member_ship_code = $user->memberShipCode($user->name, (($user->birth_date) ? $user->birth_date : date('Y-m-d')));
        $user->save();  

        Mail::send('user.email.member-ship-email', [
            'user' => $user,
        ], function ($message) use ($user) {
            $message->from('support@shroud.in', 'Support')
                ->subject('Order Placed')
                ->to($user->email, $user->name);
        });

        return redirect()->back()->with(['success' => 'Successfully to get your membership code..']);
    }

    public function resetPassword()
    {
        return view('user.change-password', [
            'cart' => true,
            'footer' => true
        ]);
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/|same:confirmPassword',
            'confirmPassword' => 'required',
        ], [
            'password.regex' => 'Please used, Password character, numeric, special character.'
        ]);
       
        $user = Auth::user();

        if (!\Hash::check($request->get('oldPassword'), $user->password)) {
            return redirect()->back()->with(['error' => 'Old password is incorrect']);
        }

        $user->password = bcrypt($request->get('password'));
        $user->save();


        Auth::logout();
        return redirect(route('user.loginForm'))->with(['success' => 'Password has been reset successfully! ']);
    }

    public function orderReturn(Request $request)
    {
        if(trim($request->get('orderId')) == "" || trim($request->get('reason')) == "" || trim($request->get('message')) == "") {
            return redirect()->back()->with(['error' => 'something is wrong please try again']);
        }

        $orderId = substr(trim($request->get('orderId')), 14);

        if(!$order = OrderProduct::where('status', 6)->where('id', $orderId)->first()) {
            return redirect()->back()->with(['error' => 'something is wrong please try again']);
        }

        $order->return_reason = trim($request->get('reason'));
        $order->message = trim($request->get('message'));
        $order->status = 7;
        $order->save();

        return redirect()->back()->with(['success' => 'Our delivery boy is come 24 hours to take your order.']);
    }


    public function logout()
    {
        Auth::logout();
        Session::forget('cart');
        Session::forget('discount');
        Session::forget('CART_AMOUNT');
        Session::forget('order');
        Session::forget('voucher');
        Session::forget('offer');
        Session::forget('addressId');
        Session::forget('orderId');

        return redirect(route('user.index'));
    }

}

<?php

namespace App\Http\Controllers\User;

use Auth;
use Session;
use Validator;
use App\Models\User;
use App\Models\Address;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$orders = OrderProduct::latest()->with(['product.variations'])->where('user_id', $user->id)->get();
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
            'birth_date' => 'required|date_format:Y-m-d',
            'anniversary_date' => 'nullable|date_format:Y-m-d',
        ]);

        $user = Auth::user();

        $user->name = $request->get('firstName').' '.$request->get('lastName');
        $user->mobile = $request->get('mobile');
        $user->birth_date = $request->get('birth_date');
        $user->anniversary_date = $request->get('anniversary_date') ?: NULL;
        $user->save();

        return redirect()->back()->with(['success' => 'Profile Updated Successfully..']);
    }

    public function getMemberShip()
    {
        $user = Auth::user();
        $user->member_ship_code = $user->memberShipCode();
        $user->save();  

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
            'password' => 'required|min:6|same:confirmPassword',
            'confirmPassword' => 'required',
        ]);
       
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with(['success' => 'Password has been reset successfully! ']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('user.index'));
    }

}

<?php

namespace App\Http\Controllers\User;

use Auth;
use Session;
use App\Models\User;
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
    		'orders' => $orders
    	]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('user.index'));
    }

}

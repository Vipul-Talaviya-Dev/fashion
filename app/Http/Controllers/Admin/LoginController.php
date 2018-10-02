<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function check(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($admin = Admin::where('email', $request->get('email'))->first()) {
            if (Hash::check($request->get('password'), $admin->password)) {
                \Session::put('admin', $admin);
                return redirect(route('admin.dashboard'));
            } else {
                return redirect()->back()->with(['message' => 'Invalid Email Or Password. ']);
            }
        }
        return redirect()->back()->with(['message' => 'Invalid Email Or Password. ']);
    }

    public function logout()
    {
        \Session::forget('admin');
        return redirect('/');
    }
}

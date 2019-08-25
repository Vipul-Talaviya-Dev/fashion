<?php

namespace App\Http\Controllers\Admin;

use Mail;
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
                return redirect()->back()->with(['error' => 'Invalid Email Or Password. ']);
            }
        }
        return redirect()->back()->with(['error' => 'Invalid Email Or Password. ']);
    }

    public function logout()
    {
        \Session::forget('admin');
        return redirect('/');
    }

    public function forgotPassword(Request $request)
    {
        return view('admin.forgot-password');
    }

    public function forgotPasswordCheck(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|exists:admins,email',
        ]);

        if ($admin = Admin::where('email', $request->get('email'))->first()) {
            $password = str_random(10);
            $admin->password = bcrypt($password);
            $admin->save();

            Mail::send('admin.email.forgot-password', [
                'name' => $admin->name,
                'email' => $admin->email,
                'password' => $password
            ], function ($message) use ($admin) {
                $message->from('support@shroud.in', 'Support')
                    ->subject('Reset account')
                    ->to($admin->email, $admin->name);
            });
            
           return redirect()->back()->with(['success' => 'Please Check Your Mail. ']);
        } else {
            return redirect()->back()->with(['error' => 'Invalid Email. ']);
        }
    }
}

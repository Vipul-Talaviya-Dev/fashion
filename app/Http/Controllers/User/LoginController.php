<?php

namespace App\Http\Controllers\User;

use Auth;
use Session;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function loginForm() 
    {
        return view('user.login', [
            'cart' => true,
            'footer' => true
        ]);
    }

    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function socialCallBackHandle($service)
    {
        try {
            if($socialUser = Socialite::with($service)->user()) {
                if(!$user = User::where('email', $socialUser->email)->first()) {
                    $user = User::create([
                        'name' => $socialUser->name,
                        'email' => $socialUser->email,
                        'referral_code' => User::referralCode(),
                    ]);
                }
                Auth::login($user);
                return redirect('/')->with(['success' => 'Successfully Login..']);
            }
        } catch(Exception $e) {
            return redirect('/')->with(['error' => $e->getMessage()]);
        }

        return redirect('/')->with(['error' => 'Oops something went wrong..']);
    }

    public function login(Request $request)
    {
        if (!$user = User::where('email', $request->get('email'))->first()) {
            return response()->json([
                'status' => false,
                'error' => "Invalid Login Email & Password",
            ]);
        }

        if (!\Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                'status' => false,
                'error' => "Invalid Login Password & Password",
            ]);
        }

        Auth::login($user);

        return response()->json([
            'status' => true,
            'success' => "Successfully Login"
        ]);
    }

    public function signUpCheck(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'mobile' => 'required|numeric|min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, []);

        if ($validator->fails()) {

            $error = $validator->errors()->all(':message');
            return response()->json([
                'status' => false,
                'error' => $error[0],
            ]);

        } else {
            $otp = mt_rand(1111, 9999);
            $user = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'password' => $request->get('password'),
                'otp' => $otp,
            ];

            Session::put('user', $user);
            return response()->json([
                'status' => true,
                'otp' => $otp
            ]);
        }      
    }

    public function signUp(Request $request)
    {
        if(Session::get('user') == null) {
            return redirect(route('user.index'));
        }

        $rules = array(
            'otp' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, []);

        if ($validator->fails()) {

            $error = $validator->errors()->all(':message');
            return response()->json([
                'status' => false,
                'error' => $error[0],
            ]);

        }

        if(Session::get('user')['otp'] != $request->get('otp')) {
            return response()->json([
                'status' => false,
                'error' => "Invalid Otp",
            ]);
        }
        $user = User::create([
            'name' => Session::get('user')['name'],
            'email' => Session::get('user')['email'],
            'mobile' => Session::get('user')['mobile'],
            'password' => \Hash::make(Session::get('user')['password']),
            'referral_code' => User::referralCode(),
        ]);
        Auth::login($user);

        Session::forget('user');

        return response()->json([
            'status' => true,
            'success' => "Successfully Registration..",
        ]);
    }
}

<?php

namespace App\Http\Controllers\User;

use Mail;
use Auth;
use Session;
use Validator;
use Socialite;
use App\Models\User;
use App\Helper\Sms;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function loginForm() 
    {
        return view('user.login', [
            'cart' => true,
            'footer' => false
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
                'error' => "Invalid Login Email & Password",
            ]);
        }

        if ($user->status == User::INACTIVE) {
            return response()->json([
                'status' => false,
                'error' => "Your Account has been De-Active.",
            ]);
        }

        if($user->member_ship_code) {
            $user->login_count = ($user->login_count+1);
            $user->save();
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
            'password' => 'required|min:6|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/',
            'birthDate' => 'required|date_format:d-m-Y',
            'anniversaryDate' => 'nullable|date_format:d-m-Y',
        );

        $message = [
            'password.regex' => 'Please set password length between 6 to 20. Also use Alphabets, numeric & Special characters.'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {

            $error = $validator->errors()->all(':message');
            return response()->json([
                'status' => false,
                'error' => $error[0],
            ]);

        } else {
            $otp = mt_rand(1111, 9999);
            $msg = "Don't Share OTP. Your Otp is = {{otp}}. This OTP expires in 05:00 minutes.";
            $message = str_replace('{{otp}}', $otp, $msg);
            // SMS Send
            self::send($request->get('mobile'), $message, $otp);
            
            $user = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'password' => $request->get('password'),
                'birthDate' => date('Y-m-d', strtotime($request->get('birthDate'))),
                'anniversaryDate' => ($request->get('anniversaryDate')) ? date('Y-m-d', strtotime($request->get('anniversaryDate'))) : NULL,
            ];

            Session::put('user', $user);
            Session::put('otp', $otp);
            return response()->json([
                'status' => true,
                'otp' => ''
                // 'otp' => $otp
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

        if(Session::get('otp') != $request->get('otp')) {
            return response()->json([
                'status' => false,
                'error' => "Invalid Otp",
            ]);
        }
        $user = User::create([
            'name' => Session::get('user')['name'],
            'email' => Session::get('user')['email'],
            'mobile' => Session::get('user')['mobile'],
            'birth_date' => Session::get('user')['birthDate'],
            'anniversary_date' => Session::get('user')['anniversaryDate'],
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

    public function resendOtp(Request $request)
    {
        Session::forget('otp');
        
        $otp = mt_rand(1111, 9999);
        $msg = "Don't Share OTP. Your Otp is = {{otp}}. This OTP expires in 05:00 minutes.";
        $message = str_replace('{{otp}}', $otp, $msg);
        // SMS Send
        self::send(Session::get('user')['mobile'], $message, $otp);

        Session::put('otp', $otp);

        return response()->json([
            'status' => true,
            'otp' => ''
            // 'otp' => $otp,
        ]);
    }

    public static function send($to, $message, $otp)
    {
        $authKey = "281230AgqvMwvw5d05f39c";
        $senderId = "SHROUD";
        $route = 4;
        // https://control.msg91.com/api/sendotp.php
        (new Client)->post('http://control.msg91.com/api/sendotp.php', [
            'form_params' => [
                'authkey' => $authKey,
                'mobiles' => $to,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route,
                'otp' => $otp
            ]
        ]);

        return true;
    }

    public function otpExpire()
    {
        Session::forget('otp');
        return redirect()->back()->with(['error' => 'Your Otp is expired, please try again.']);
    }
    public function forgotPassword(Request $request)
    {
        $user = new User;
        if(is_numeric($request->get('emailorMobile'))) {
            if($user = $user->where('mobile', $request->get('emailorMobile'))->first()) {
                $otp = mt_rand(1111, 9999);
                Session::put('user', [
                    'mobile' => $user->mobile,
                ]);
                Session::put('otp', $otp);

                $msg = "Don't Share OTP. Your Otp is = {{otp}}. This OTP expires in 05:00 minutes.";
                $message = str_replace('{{otp}}', $otp, $msg);
                // SMS Send
                self::send($user->mobile, $message, $otp);

                return response()->json([
                    'status' => true,
                    // 'otp' => $otp,
                    'otp' => '',
                    'email' => false,
                    'success' => ""
                ]);

            } else {
                return response()->json([
                    'status' => false,
                    'error' => "Invalid Mobile No",
                ]);
            }
            $msg = "Invalid Mobile No";
        } else {
            if($user = $user->where('email', $request->get('emailorMobile'))->first()) {

                $password = str_random(10);
                $user->password = bcrypt($password);
                $user->save();

                Mail::send('admin.email.forgot-password', [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $password
                ], function ($message) use ($user) {
                    $message->from('support@shroud.in', 'Support')
                        ->subject('Reset account')
                        ->to($user->email, $user->name);
                });

                return response()->json([
                    'status' => true,
                    'email' => true,
                    'success' => "Please Check Your Mail"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => "Invalid Email",
                ]);
            }
        }
    }


    public function forgotPasswordOtp(Request $request)
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

        if($user = User::where('mobile', Session::get('user')['mobile'])->first()) {
            if((string)Session::get('otp') == $request->get('otp')) {

                Auth::login($user);

                return response()->json([
                    'status' => true,
                    'success' => "",
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => "Invalid Otp",
                ]);
            }
        }
        Session::forget('user');
        return response()->json([
            'status' => false,
            'success' => "Invalid Otp",
        ]);
    }
}

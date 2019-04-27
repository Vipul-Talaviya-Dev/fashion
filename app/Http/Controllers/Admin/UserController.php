<?php

namespace App\Http\Controllers\Admin;

use DB;
use Mail;
use Cloudder;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index(Request $request)
	{
		$users = User::latest();

		if($request->get('search')) {
			$users = $users->where('email', $request->get('search'))->Orwhere('mobile', $request->get('search'))->Orwhere('name', $request->get('search'));
		}

		return view('admin.user.index', [
			'users' => $users->paginate(10)
		]);
	}

	public function add(Request $request)
	{
		return view('admin.user.add');
	}

	public function create(Request $request)
	{
		$this->validate($request, [
			'firstName' => 'required',
			'lastName' => 'required',
            'mobile' => 'required|numeric|min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirmPassword',
            'birthDate' => 'required|date_format:Y-m-d',
            'anniversaryDate' => 'nullable|date_format:Y-m-d',
		]);

		$user = User::create([
            'name' => $request->get('firstName').' '.$request->get('lastName'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'birth_date' => $request->get('birthDate'),
            'anniversary_date' => $request->get('anniversaryDate'),
            'password' => \Hash::make($request->get('password')),
            'referral_code' => User::referralCode(),
        ]);


        Mail::send('admin.email.forgot-password', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $request->get('password')
        ], function ($message) use ($user) {
            $message->from('support@shroud.in', 'Support')
                ->subject('Welcome to shroud Member')
                ->to($user->email, $user->name);
        });

        return redirect(route('admin.users'))->with('success','User has been inserted successfully.'); 
	}

	public function changeStatus(Request $request)
	{
		if(!$user = User::find($request->get('id'))) {
			return response()->json([
				'status' => false,
				'message' => 'Invalid Id Selected'
			]);
		}

		$user->status = ($user->status == User::ACTIVE) ? 2 : 1;
		$user->save();
		

		return response()->json([
			'status' => true,
			'message' => ($user->status == User::ACTIVE) ? 'This User has Activated.' : 'This User has De-Activated.'
		]);
	}
}

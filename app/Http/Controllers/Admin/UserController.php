<?php

namespace App\Http\Controllers\Admin;

use DB;
use Mail;
use Cloudder;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function index(Request $request)
	{
		$users = User::latest();

		if($request->get('search')) {
			$users = $users->where('name', 'LIKE', '%'.$request->get('search').'%')->orWhere('email', 'LIKE', '%'.$request->get('search').'%')->orWhere('mobile', 'LIKE', '%'.$request->get('search').'%')->orWhere('member_ship_code', 'LIKE', '%'.$request->get('search').'%');
		}

		if ($request->get('birthDate')) {
			$users = $users->where('birth_date', date('Y-m-d', strtotime($request->get('birthDate'))));
		}

		if ($request->get('anniversaryDate')) {
			$users = $users->where('anniversary_date', date('Y-m-d', strtotime($request->get('anniversaryDate'))));
		}

		if ($request->get('onlyMember')) {
			$users = $users->where('member_ship_code', '!=', NULL);
		}
		
		if($request->get('excel')) {
			// $getOrders = $orders->get();
			return Excel::download(new UserExport, date('Y-m-d-H-i').'-users.xlsx');
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
            'password' => 'required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/|same:confirmPassword',
            'birthDate' => 'required',
            'anniversaryDate' => 'nullable',
		], [
            'password.regex' => 'Please used, Password character, numeric, special character.'
        ]);

		$user = User::create([
            'name' => $request->get('firstName').' '.$request->get('lastName'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'birth_date' => date('Y-m-d', strtotime($request->get('birthDate'))),
            'anniversary_date' => ($request->get('anniversaryDate')) ? date('Y-m-d', strtotime($request->get('anniversaryDate'))) : NULL,
            'password' => \Hash::make($request->get('password')),
            'referral_code' => User::referralCode(),
        ]);

		if ($request->get('memberCode')) {
			$user->member_ship_code = User::memberShipCode($user->name, $user->birth_date);
			$user->save();
		}

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

	public function generateMemberShipCode($id)
	{
		if(!$user = User::find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		$user->member_ship_code = User::memberShipCode($user->name, $user->birth_date);
		$user->save();

		return redirect()->back()->with('success', 'Successfully Generate Member Ship Code');
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

<?php

namespace App\Http\Controllers\User;

use Auth;
use Validator;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		return view('user.addresses', [
			'addresses' => $user->addresses,
			'cart' => true,
			'footer' => true
		]);
	}

    public function createAddress(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'mobile' => 'required|numeric|digits_between:10,12',
            'address' => 'required',
            'pincode' => 'required|numeric|digits:6',
            'city' => 'required|alpha',
            'state' => 'required|alpha',
        );

        $validator = Validator::make($request->all(), $rules, []);

        if ($validator->fails()) {

            $error = $validator->errors()->all(':message');
            return response()->json([
                'status' => false,
                'error' => $error[0],
            ]);

        } else {
            $user = Auth::user();
            Address::create([
                'user_id' => $user->id,
                'name' => $request->get('name'),
                'mobile' => $request->get('mobile'),
                'address' => $request->get('address'),
                'address_1' => $request->get('address1'),
                'pincode' => $request->get('pincode'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'country' => $request->get('country') ?: 'India',
            ]);

            return response()->json([
                'status' => true,
                'success' => 'Successfully Add Your Address !'
            ]);
        }
    }

    public function delete($id)
	{
		$user = Auth::user();
		if(!$address = $user->addresses->find($id)) {
			return redirect()->back();
		}

		$address->delete();

		return redirect()->back()->with(['success' => 'Successfully Delete Your Address.. !']);
	}
}

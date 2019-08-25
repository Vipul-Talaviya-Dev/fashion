<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.admin.index', [
            'admins' => Admin::search($request->input('search'), ['fname'])->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|same:repeat_password',
            'repeat_password' => 'required',
            'contact' => 'required|unique:admins,mobile',
        ]);

        Admin::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'mobile' => $request->contact,
        ]);

        return redirect('/admin')->with('success', 'Admin has been inserted successfully.');
    }

    public function edit($id)
    {
        return view('admin.admin.update', [
            'admin' => Admin::find(base64_decode($id)),
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$admin = Admin::find(base64_decode($id))) {
            return redirect()->back()->with(['error' => 'Invalid Selected id.']);
        }

        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email')->ignore(base64_decode($id))
            ],
            'contact' => [
                'required',
                'numeric',
                Rule::unique('admins', 'mobile')->ignore(base64_decode($id))
            ]
        ]);

        $admin->name = $request->name;
        $admin->gender = $request->gender;
        $admin->email = $request->email;
        $admin->mobile = $request->contact;
        $admin->save();
        return redirect('/admin')->with('success', 'Admin has been updated successfully.');
    }

}

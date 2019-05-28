<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubAdminController extends Controller
{
    public function index(Request $request)
	{
		return view('admin.subAdmin.index', [
			'subAdmins' => Admin::latest()->where('role', 2)->get(),
		]);
	}

	public function add()
	{
		return view('admin.subAdmin.add', [
            'modules' => Module::orderBy('name', 'ASC')->get()
        ]);
	}

	public function create(Request $request)
	{
		$this->validate($request, [
			'name'       => 'required',
            'email'      => 'required|email|unique:admins,email',
            'password'   => 'required|min:6',
            'modules' => 'required',
		]);

		Admin::create([
            'name' 	     => trim($request->get('name')),
            'email' 	 => trim($request->get('email')),
            'password'   => bcrypt(trim($request->get('password'))),
            'role'       => 2,
            'modules_id' => implode(', ', $request->get('modules'))
        ]);

		return redirect(route('admin.subAdmins'))->with(['success' => 'Sub Admin has been added successfully..']);
	}

	public function edit($id)
	{
		if(!$subAdmin = Admin::find($id)) {
			return redirect()->back()->with(['error' => 'Invalid Id Selected.']);
		}

		return view('admin.subAdmin.update', [
			'subAdmin' => $subAdmin, 
			'modules'   => Module::get()
		]);
	}

	public function update(Request $request, $id)
	{
		if(!$subAdmin = Admin::find($id)) {
			return redirect()->back()->with(['error' => 'Invalid Id Selected.']);
		}

		$this->validate($request, [
			'name'       => 'required',
            'email'      => 'required|email|unique:admins,email,'.$subAdmin->id,
            'password'   => 'nullable|min:6',
            'modules' => 'required|array',
		]);

		$subAdmin->name   = trim($request->get('name'));
        $subAdmin->email  = trim($request->get('email'));
        if(trim($request->get('password'))) {
        	$subAdmin->password  = bcrypt(trim($request->get('password')));
        }
        $subAdmin->modules_id = implode(', ', $request->get('modules'));
        $subAdmin->save();

        return redirect(route('admin.subAdmins'))->with(['success' => 'Sub Admin has been Update successfully..']);
	}

	public function delete(Request $request)
	{
		if(!$subAdmin = Admin::find($request->get('id'))) {
			return [
				'status' => false,
				'error' => 'Invalid Id Selected.'
			];
		}

		$subAdmin->delete();

		return [
			'status' => true,
			'success' => 'Sub Admin has been Delete successfully..'
		];
	}
}

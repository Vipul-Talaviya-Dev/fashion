<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.size.index', [
            'sizes' => Size::search($request->input('search'), ['name'])->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.size.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'size' => 'required|unique:sizes,name',
            'status' => 'required|numeric',
        ]);

        Size::create([
            'name' => $request->get('size'),
            'status' => $request->get('status'),
        ]);

        return redirect(route('admin.sizes'))->with('success','Size has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$size = Size::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }
        return view('admin.size.update', [
            'size' => $size
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$size = Size::find($id)) {
            return redirect()->back()->with(['error' => 'Invalid Selected id.']);
        }

        $this->validate($request, [
            'size' => [
                'required',
                Rule::unique('sizes', 'name')->ignore($id)
            ],
            'status' => 'required|numeric',
        ]);

        $size->name = $request->get('size');
        $size->status = $request->get('status');
        $size->save();

        return redirect(route('admin.sizes'))->with('success','Size has been updated successfully.');
    }

    public function delete($id)
    {
        Size::find($id)->delete();
        return redirect(route('admin.sizes'));
    }
}

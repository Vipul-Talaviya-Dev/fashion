<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.color.index',[
            'colors' => Color::search($request->input('search'), ['name'])->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.color.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'color' => 'required|unique:colors,name',
            'code' => 'required|unique:colors,code',
            'status' => 'required|numeric',
        ]);
        Color::create([
            'name' => $request->get('color'),
            'code' => $request->get('code'),
            'status' => $request->get('status'),
        ]);
        return redirect(route('admin.colors'))->with('success','Color has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$color = Color::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        return view('admin.color.update', [
            'color' => $color
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$color = Color::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        $this->validate($request, [
            'color' => [
                'required',
                Rule::unique('colors', 'name')->ignore($id)
            ],
            'code' => [
                'required',
                Rule::unique('colors', 'code')->ignore($id)
            ],
            'status' => 'required|numeric',
        ]);

        $color->name = $request->get('color');
        $color->code = $request->get('code');
        $color->status = $request->get('status');
        $color->save();

        return redirect(route('admin.colors'))->with('success','Color has been updated successfully.');
    }

    public function delete($id)
    {
        Color::find($id)->delete();
        return redirect(route('admin.colors'))->with('success','Color has been deleted successfully.');
    }
}

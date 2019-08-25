<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Validation\Rule;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.brand.index',[
            'brands' => Brand::search($request->input('search'), ['name'])->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.brand.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands,name',
            'image' => 'required|max:2048|mimes:jpeg,jpg,png,gif',
            'status' => 'required|numeric',
        ]);

        Brand::create([
            'name' => trim($request->get('name')),
            'image' => Cloudder::upload($request->file('image'), [])->getPublicId(),
            'status' => $request->get('status'),
        ]);
        return redirect(route('admin.brands'))->with('success','Brand has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$brand = Brand::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        } 
        
        return view('admin.brand.update', [
            'brand' => $brand
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$brand = Brand::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('brands', 'name')->ignore($id)
            ],
            'status' => 'required|numeric',
        ]);

        if ($request->file('image')) {
            $this->validate($request, [
                'image' => 'required|max:2048|mimes:jpeg,jpg,png,gif',
            ]);
            $brand->image = Cloudder::upload($request->file('image'), [])->getPublicId();
        }
        $brand->name = trim($request->get('name'));
        $brand->status = $request->get('status');
        $brand->save();

        return redirect(route('admin.brands'))->with('success', 'Brand has been updated successfully.');

    }

}

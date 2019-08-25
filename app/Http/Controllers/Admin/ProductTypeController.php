<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProductTypeController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.productType.index', [
            'productTypes' => ProductType::search($request->input('search'), ['name'])->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.productType.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required|numeric',
        ]);

        ProductType::create([
            'name' => $request->get('name'),
            'status' => $request->get('status'),
        ]);

        return redirect(route('admin.productTypes'))->with('success','Type has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$productType = ProductType::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }
        return view('admin.productType.update', [
            'productType' => $productType
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$productType = ProductType::find($id)) {
            return redirect()->back()->with(['error' => 'Invalid Selected id.']);
        }

        $this->validate($request, [
            'name' => 'required',
            'status' => 'required|numeric',
        ]);

        $productType->name = $request->get('name');
        $productType->status = $request->get('status');
        $productType->save();

        return redirect(route('admin.productTypes'))->with('success','Type has been updated successfully.');
    }

    public function delete($id)
    {
        ProductType::find($id)->delete();
        return redirect(route('admin.productTypes'));
    }
}

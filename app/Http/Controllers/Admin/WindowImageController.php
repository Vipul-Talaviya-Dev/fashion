<?php

namespace App\Http\Controllers\Admin;

use Cloudder;
use App\Models\WindowImage;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WindowImageController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.windowImage.index', [
            'windowImages' => WindowImage::search($request->input('search'), ['title'])->paginate(10),
        ]);
    }

    public function add()
    {
        return view('admin.windowImage.add');
    }

    public function create(Request $request)
    {
        $file = $request->file('image');
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required|url',
            'productId' => 'required|numeric',
            'order' => 'required|numeric|min:0',
            'status' => 'required|numeric',
            'image' => 'required|image'
        ]);


        WindowImage::create([
            'title' => $request->get('title'),
            'link' => $request->get('url'),
            'image' => Cloudder::upload($file, [])->getPublicId(),
            'order' => $request->get('order'),
            'description' => $request->get('description'),
            'status' => $request->get('status'),
        ]);

        return redirect(route('admin.windowImages'))->with('success', 'Home Image has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$windowImage = WindowImage::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        return view('admin.windowImage.update', [
            'windowImage' => $windowImage,
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$windowImage = WindowImage::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|url',
            'status' => 'required|numeric',
            'order' => 'required|numeric|min:0',
            'image' => 'nullable|image',
        ]);

        if ($request->file('image')) {
            \Cloudder::destroy($windowImage->image);
            $windowImage->image = Cloudder::upload($request->file('image'), [])->getPublicId();
        }

        $windowImage->title = $request->get('name');
        $windowImage->link = $request->get('url');
        $windowImage->description = $request->get('description');
        $windowImage->status = $request->get('status');
        $windowImage->order = $request->get('order');
        $windowImage->save();
        
        return redirect(route('admin.windowImages'))->with('success', 'Window Image has been updated successfully.');
    }

    public function delete(Request $request, $id)
    {
        if (!$windowImage = WindowImage::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }
        $windowImage->delete();
        return redirect(route('admin.windowImages'))->with('success', 'Window Image has been deleted successfully.');
    }
}

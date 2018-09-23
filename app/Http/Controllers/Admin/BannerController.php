<?php

namespace App\Http\Controllers\Admin;

use Cloudder;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.banner.index', [
            'banners' => Banner::search($request->input('search'), ['name'])->paginate(10),
        ]);
    }

    public function add()
    {
        return view('admin.banner.add');
    }

    public function create(Request $request)
    {
        $file = $request->file('image');
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|url',
            'image' => 'required|image',
            'status' => 'required|numeric',
        ]);

        Banner::create([
            'name' => $request->get('name'),
            'url' => $request->get('url'),
            'image' => Cloudder::upload($file, [])->getPublicId(),
            'description' => $request->get('description'),
            'status' => $request->get('status'),
        ]);

        return redirect(route('admin.banners'))->with('success', 'Banner has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$banner = Banner::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        return view('admin.banner.update', [
            'banner' => $banner
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$banner = Banner::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|url',
            'status' => 'required|numeric',
        ]);

        if ($request->file('image')) {
            \Cloudder::destroy($banner->image);
            $banner->image = Cloudder::upload($request->file('image'), [])->getPublicId();
        }
        $banner->name = $request->get('name');
        $banner->url = $request->get('url');
        $banner->description = $request->get('description');
        $banner->status = $request->get('status');
        $banner->save();
        
        return redirect(route('admin.banners'))->with('success', 'Banners has been updated successfully.');
    }

    public function delete(Request $request, $id)
    {
        Banner::find($id)->delete();
        return redirect(route('admin.banners'));
    }
}

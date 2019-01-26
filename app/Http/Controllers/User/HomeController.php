<?php

namespace App\Http\Controllers\User;

use App\Models\Banner;
use App\Models\WindowImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$images = [];
    	foreach (WindowImage::latest()->limit(10)->get() as $key => $image) {
    		$data = [
    			'title' => $image->title,
    			'image' => \Cloudder::secureShow($image->image),
    			'url' => $image->link
    		];
    		$images[$key+1] = $data;
    	}
    	
        return view('user.index', [
        	'windowImages' => $images,
            'banners' => Banner::latest()->get()
        ]);
    }
}

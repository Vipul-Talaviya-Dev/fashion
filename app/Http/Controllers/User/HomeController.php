<?php

namespace App\Http\Controllers\User;

use App\Models\Banner;
use App\Models\Contact;
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
            'banners' => Banner::latest()->active()->get(),
            'cart' => false,
            'footer' => true
        ]);
    }

    public function contact()
    {
        return view('user.contact', [
            'cart' => false,
            'footer' => true
        ]);
    }

    public function addContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'message' => $request->get('message'),
        ]);

        return redirect()->back()->with(['success' => 'Thank You Contact Us.']);
    }
}

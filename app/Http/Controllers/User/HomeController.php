<?php

namespace App\Http\Controllers\User;

use App\Models\Banner;
use App\Models\Content;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\WindowImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        \Session::forget('updateUser');

    	$images = [];
    	foreach (WindowImage::active()->latest()->limit(10)->get() as $key => $image) {
    		$data = [
    			'title' => $image->title,
    			'image' => \Cloudder::secureShow($image->image),
    			'url' => $image->link
    		];
    		$images[$key+1] = $data;
    	}
	       
        if ($counter = Counter::find(1)) {
            $counter->visitor = $counter->visitor+1;
            $counter->save();
        } else {
            Counter::create(['visitor' => 1]);
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

    public function about()
    {
        return view('user.content', [
            'content' => Content::find(1),
            'cart' => false,
            'footer' => true
        ]);
    }

    public function faq()
    {
        return view('user.content', [
            'content' => Content::find(2),
            'cart' => false,
            'footer' => true
        ]);
    }

    public function termCondition()
    {
        return view('user.content', [
            'content' => Content::find(3),
            'cart' => false,
            'footer' => true
        ]);
    }

    public function privacyPolicy()
    {
        return view('user.content', [
            'content' => Content::find(4),
            'cart' => false,
            'footer' => true
        ]);
    }
}

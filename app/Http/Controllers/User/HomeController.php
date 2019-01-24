<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Banner;
use App\Models\WindowImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	// $pro = Product::with(['category.parent.parent'])->find(3);
    	// dd($pro->category->parent->parent->slug.'/'.$pro->category->parent->slug.'/'.$pro->category->slug);
        return view('user.index', [
        	'products' => Product::with(['category.parent.parent'])->latest()->limit(4)->get(),
        	'windowImages' => WindowImage::latest()->limit(2)->get(),
            'banners' => Banner::latest()->get()
        ]);
    }
}

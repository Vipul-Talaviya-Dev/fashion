<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Product;
use App\Models\WindowImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('user.index', [
        	'brands' => Brand::latest()->get(),
        	'products' => Product::latest()->limit(4)->get(),
        	'windowImages' => WindowImage::latest()->limit(2)->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('user.product-list');
    }

    public function productDetail($mainCategory, $subCategory, $thirdCategory, $productUrl, Request $request)
    {
    	dd("ffff");
    	return view('user.product-detail');
    }
}

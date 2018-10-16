<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index($mainCategory, $subCategory, $thirdCategory, Request $request)
    {
    	$products = new Product;
    	$category = new Category;	
    	if($thirdCategory == 'all') {
    		$category = $category->where('slug', $subCategory)->first(); 
    	} else {
			$category = $category->where('slug', $thirdCategory)->first(); 
    	}
		$products = $products->with(['category.parent.parent'])->where('category_id', $category->id)->get();

        return view('user.product-list', [
        	'products' => $products
        ]);
    }

    public function productDetail($mainCategory, $subCategory, $thirdCategory, $productUrl, Request $request)
    {
    	// dd("ffff");
    	return view('user.product-detail');
    }
}

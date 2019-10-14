<?php

namespace App\Http\Controllers\Admin;

use Session;
use Cloudder;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latest()->search($request->get('search'), ['name']);
        
        return view('admin.product.index', [
            'categories' => Category::all(),
            'products' => $products->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.product.add', [
            'categories' => Category::parents()->active()->get(),
            'colors' => Color::active()->get(),
            'sizes' => Size::active()->get(),
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'adminProductName' => 'required',
            'hsn_code' => 'required',
            // 'brand' => 'nullable|exists:brands,id',
            'categoryId' => 'required|exists:categories,id',
            // 'colors' => 'required|array|min:1',
            // 'sizes' => 'required|array|min:1',
            // 'prices' => 'required|array|min:1',
            // 'quantities' => 'required|array|min:1',
            // 'images' => 'required|array|min:1',
            'chart' => 'required|image',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        // dd($request->all());

        $lastId = (Product::latest()->first() ? Product::latest()->first()->id : 1);
        $file = $request->file('chart');

        $product = Product::create([
            'name' => trim($request->get('name')),
            'hsn_code' => trim($request->get('hsn_code')),
            'admin_side_name_show' => trim($request->get('adminProductName')),
            'slug' => trim(str_slug($request->get('name')).date('YmdHis').$lastId),
            'category_id' => $request->get('categoryId'),
            'brand_id' => 1,
            'description' => $request->get('description'),
            'meta_keyword' => $request->get('meta_keyword'),
            'meta_description' => $request->get('meta_description'),
            'chart' => Cloudder::upload($file, [])->getPublicId(),
        ]);

        /*for ($i = 0; $i < count($request->get('colors')); $i++) {
            $images = [];
            for ($j = 0; $j < count($request->file('images')[$i]); $j++) {
                $images[] = Cloudder::upload($request->file('images')[$j], [])->getPublicId();
            }
            Variation::create([
                'product_id' => $product->id,
                'color_id' => $request->get('colors')[$i],
                'size_id' => $request->get('sizes')[$i],
                'images' => implode(',', $images),
                'price' => $request->get('prices')[$i],
                'qty' => $request->get('quantities')[$i],
            ]);
            /*\DB::insert('insert into product_size (product_id, size_id, price, qty) values (?, ?, ?, ?)', [
                $product->id, $request->get('sizes')[$i], $request->get('prices')[$i], $request->get('quantities')[$i]
            ]);

            \DB::insert('insert into color_product (product_id, color_id, price, qty) values (?, ?, ?, ?)', [
                $product->id, $request->get('colors')[$i], $request->get('prices')[$i], $request->get('quantities')[$i]
            ]);*/
        // }*/

        return redirect(route('admin.product.variationInsert', ['id' => $product->id]))->with('success','Product has been inserted successfully.');        
    }

    public function edit($id)
    {
        if(!$product = Product::with(['variations'])->find($id)) {
            return redirect()->back();
        }
        
        return view('admin.product.update', [
            'product' => $product,
            'categories' => Category::parents()->active()->get(),
        ]);

        return view('admin.product.update');
    }

    public function update(Request $request, $id)
    {
        if(!$product = Product::find($id)) {
            return redirect()->back();
        }

        $this->validate($request, [
            'name' => 'required',
            'hsn_code' => 'required',
            'categoryId' => 'nullable|exists:categories,id',
            'chart' => 'nullable|image',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'adminProductName' => 'required',
        ]);

        if($request->get('categoryId')) {
            $product->category_id = $request->get('categoryId');
        }

        if ($request->file('chart')) {
            // \Cloudder::destroy($product->chart);
            $product->chart = Cloudder::upload($request->file('chart'), [])->getPublicId();
        }

        $product->name = trim($request->get('name'));
        $product->hsn_code = $request->get('hsn_code');
        $product->admin_side_name_show = $request->get('adminProductName');
        $product->meta_keyword = $request->get('meta_keyword');
        $product->meta_description = $request->get('meta_description');
        $product->description = $request->get('description');
        $product->save();

        return redirect(route('admin.products'))->with(['success' => 'successfully update your product.']);
    }

    public function subCategory(Request $request)
    {
        return response()->json([
            'status' => true,
            'categories' => Category::active()->where('parent_id', $request->get('id'))->get(['id', 'name'])
        ]);
    }
}

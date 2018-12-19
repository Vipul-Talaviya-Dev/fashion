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
            'brands' => Brand::active()->get(),
            'colors' => Color::active()->get(),
            'sizes' => Size::active()->get(),
        ]);
    }

    public function create(Request $request)
    {
        // dd($request->all());
        if ($request->get('maxPrice') <= $request->get('price')) {
            return redirect()->back()->with('error', 'Price is not greater than or equal to Max Price.')->withInput();
        }

        $this->validate($request, [
            'name' => 'required',
            'brand' => 'nullable|exists:brands,id',
            'maxPrice' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            // 'discount' => 'numeric|min:1',
            'categoryId' => 'required|exists:categories,id',
            'colors' => 'required|array|min:1',
            'sizes' => 'required|array|min:1',
            'prices' => 'required|array|min:1',
            'quantities' => 'required|array|min:1',
            'thumbImage' => 'required|image',
            'smallImages' => 'required|array|min:1',
            'highlights' => 'required',
            'shortDescription' => 'required',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        // dd($request->all());

        $subImages = [];
        for ($i = 0; $i < count($request->file('smallImages')); $i++) {
            $subImages[] = Cloudder::upload($request->file('smallImages')[$i], [])->getPublicId();
        }

        $lastId = (Product::latest()->first() ? Product::latest()->first()->id : 1);
        $total = $request->get('maxPrice') - $request->get('price');
        $discount = ($total / $request->get('maxPrice') * 100);
        $product = Product::create([
            'name' => trim($request->get('name')),
            'slug' => trim(str_slug($request->get('name')).date('YmdHis').$lastId),
            'price' => $request->get('price'),
            'max_price' => $request->get('maxPrice'),
            'category_id' => $request->get('categoryId'),
            'brand_id' => $request->get('brand'),
            'thumb_image' => Cloudder::upload($request->file('thumbImage'), [])->getPublicId(),
            'small_image' => implode(',', $subImages),
            'description' => $request->get('description'),
            'short_description' => $request->get('shortDescription'),
            'meta_keyword' => $request->get('meta_keyword'),
            'meta_description' => $request->get('meta_description'),
            'highlights' => $request->get('highlights'),
            'discount' => floor($discount)
        ]);

        for ($i = 0; $i < count($request->get('colors')); $i++) {
            Variation::create([
                'product_id' => $product->id,
                'color_id' => $request->get('colors')[$i],
                'size_id' => $request->get('sizes')[$i],
                'price' => $request->get('prices')[$i],
                'qty' => $request->get('quantities')[$i],
            ]);
            /*\DB::insert('insert into product_size (product_id, size_id, price, qty) values (?, ?, ?, ?)', [
                $product->id, $request->get('sizes')[$i], $request->get('prices')[$i], $request->get('quantities')[$i]
            ]);

            \DB::insert('insert into color_product (product_id, color_id, price, qty) values (?, ?, ?, ?)', [
                $product->id, $request->get('colors')[$i], $request->get('prices')[$i], $request->get('quantities')[$i]
            ]);*/
        }

        return redirect(route('admin.products'))->with('success','Product has been inserted successfully.');        
    }

    public function edit($id)
    {
        if(!$product = Product::with(['variations'])->find($id)) {
            return redirect()->back();
        }
        
        return view('admin.product.update', [
            'product' => $product,
            'categories' => Category::parents()->active()->get(),
            'brands' => Brand::active()->get(),
            'colors' => Color::active()->get(),
            'sizes' => Size::active()->get(),
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
            'brand' => 'required|exists:brands,id',
            'maxPrice' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'categoryId' => 'nullable|exists:categories,id',
            'colors' => 'required|array|min:1',
            'sizes' => 'required|array|min:1',
            'prices' => 'required|array|min:1',
            'quantities' => 'nullable|array|min:1',
            'existQuantities' => 'required|array|min:1',
            'thumbImage' => 'nullable|image',
            'smallImages' => 'nullable|array|min:1',
            'highlights' => 'required',
            'shortDescription' => 'required',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        if($request->get('categoryId')) {
            $product->category_id = $request->get('categoryId');
        }
        if ($request->get('existQuantities')) {
            foreach ($request->get('existQuantities') as $variationId => $qty) {
                if($variation = Variation::find($variationId)) {
                    $variation->qty = $qty;
                    $variation->save();
                }
            }
        }

        if($request->file('smallImages')) {
            $subImages = [];
            for ($i = 0; $i < count($request->file('smallImages')); $i++) {
                $subImages[] = Cloudder::upload($request->file('smallImages')[$i], [])->getPublicId();
            }
            $product->small_image = implode(',', $subImages);
        }

        if($request->file('thumbImage')) {
            $product->thumb_image = Cloudder::upload($request->file('thumbImage'), [])->getPublicId();
        }
        if (count($request->get('colors')) > 1) {
            for ($i = 0; $i < count($request->get('colors')); $i++) {
                Variation::create([
                    'product_id' => $product->id,
                    'color_id' => $request->get('colors')[$i],
                    'size_id' => $request->get('sizes')[$i],
                    'price' => $request->get('prices')[$i],
                    'qty' => $request->get('quantities')[$i],
                ]);
            }
        }

        $product->brand_id = $request->get('brand');
        $product->name = $request->get('name');
        $product->max_price = $request->get('maxPrice');
        $product->price = $request->get('price');
        $product->meta_keyword = $request->get('meta_keyword');
        $product->meta_description = $request->get('meta_description');
        $product->highlights = $request->get('highlights');
        $product->description = $request->get('description');
        $product->short_description = $request->get('shortDescription');
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

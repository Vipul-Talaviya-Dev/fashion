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
        $products = Product::latest()->search($request->input('search'), ['name']);
        
        return view('admin.product.index', [
            'categories' => Category::all(),
            'products' => $products->paginate(10)
        ]);
    }

    public function add()
    {
        // \Session::forget('product');
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

        $total = $request->get('maxPrice') - $request->get('price');
        $discount = ($total / $request->get('maxPrice') * 100);
        $product = Product::create([
            'name' => trim($request->get('name')),
            'slug' => trim(str_slug($request->get('name'))),
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
        $product = Product::with([
            'category',
            'seller',
            'category.attribute',
            'category.attribute.attributeValue',
            'variations.color',
            'variations.size',
            'brand'
        ])->where('id', base64_decode($id))->first();
        $category = Category::find($product->category->parent_id);
        $attributes = Attribute::where('category_id', '=', $product->category_id)->get()->map(function (
            Attribute $attribute
        ) {
            return [
                'id' => $attribute->id,
                'name' => $attribute->name,
                'values' => AttributeValue::where('attribute_id', '=', $attribute->id)->get()->map(function (
                    AttributeValue $value
                ) {
                    return [
                        'id' => $value->id,
                        'value' => $value->value,
                    ];
                }),
            ];
        });
        $values = $product->attributeValues()->get()->map(function (
            AttributeValue $item
        ) {
            $attribute = Attribute::find($item->attribute_id);
            return [
                'valueID' => $attribute->id,
                'id' => $attribute->name,
                'subID' => $item->id,
                'name' => $item->value,
            ];
        })->toArray();
        $brands = Brand::active()->get();
        $images = ProductImage::select('color_id')->groupBy('color_id')->where('product_id', '=',
            $product->id)->get()->map(function (ProductImage $image) use ($product) {
            $color = Color::find($image->color_id);
            return [
                'colorID' => $image->color_id,
                'colorName' => $color->name,
                'images' => ProductImage::where('product_id', '=', $product->id)->where('color_id', '=',
                    $image->color_id)->get()->map(function (ProductImage $img) {
                    return [
                        'id' => $img->id,
                        'image' => \Cloudder::secureShow($img->name, []),
                    ];
                }),
            ];
        });
        return view('admin.product.update', [
            'product' => $product,
            'category' => $category,
            'attributes' => $attributes,
            'values' => $values,
            'brands' => $brands,
            'images' => $images,
        ]);

        return view('admin.product.update');
    }

    public function update(Request $request, $id)
    {
        $variations = array_combine($request->quantity, $request->variationID);

        $this->validate($request, [
            'name' => 'required',
            'brand' => 'required|exists:brands,id',
            'maxPrice' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $discount = $request->maxPrice - $request->price;
        $total = ($discount / $request->maxPrice) * 100;

        $product = Product::find(base64_decode($id));
        $product->name = $request->name;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->max_price = $request->maxPrice;
        $product->discount = floor($total);
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();

        $upDiscount = Discount::where('product_id', $product->id)->first();
        $upDiscount->discount = floor($total);
        $upDiscount->save();

        $product->attributeValues()->sync($request['attribute']);

        foreach ($variations as $key => $val) {
            $variation = Variation::find($val);
            $variation->quantity = $key;
            $variation->save();
        }

        if (!empty($request->colorImages)) {
            foreach ($request->colorImages as $key => $image) {
                $pImage = ProductImage::where('product_id', $product->id)->where('color_id', $key)->first();
                \Cloudder::destroy($pImage->name);
                ProductImage::where('product_id', $product->id)->where('color_id', $key)->delete();
            }
        }
        if (!empty($request->colorImages)) {
            foreach ($request->colorImages as $key => $image) {
                foreach ($image as $value) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'color_id' => $key,
                        'name' => \Cloudder::upload($value, [])->getPublicId(),
                    ]);
                }
            }
        }


//        Variation::where('product_id', '=', $id)->delete();
//        $colors = $request->color;
//
//        for ($i = 0; $i < count($colors); $i++) {
//            Variation::create([
//                'product_id' => $id,
//                'color_id' => $request->color[$i],
//                'size_id' => $request->size[$i],
//                'quantity' => $request->quantity[$i]
//            ]);
//        }
        {
            return redirect('/product')->with('success', 'Product has been updated successfully.');
        }
    }

    public function subCategory(Request $request)
    {
        return response()->json([
            'status' => true,
            'categories' => Category::active()->where('parent_id', $request->get('id'))->get(['id', 'name'])
        ]);
    }
}

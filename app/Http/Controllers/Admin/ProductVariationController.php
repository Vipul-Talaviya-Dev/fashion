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

class ProductVariationController extends Controller
{
    public function index($id)
    {
        if(!$product = Product::find($id)) {
            return redirect()->back();
        }

        $variations = Variation::with(['color', 'size'])->where('product_id', $product->id)->paginate(10);

        return view('admin.productVariation.index', [
            'product' => $product,
            'variations' => $variations
        ]);
    }
    public function variationInsert($id)
    {
        if(!$product = Product::find($id)) {
            return redirect()->back();
        }

        return view('admin.productVariation.add', [
            'colors' => Color::active()->get(),
            'sizes' => Size::active()->get(),
            'product' => $product
        ]);
    }

    public function variationCreate(Request $request, $id)
    {
        if(!$product = Product::find($id)) {
            return redirect()->back();
        }

        $this->validate($request, [
            'colorId' => 'required|exists:colors,id',
            'sizes' => 'required|array|min:1',
            'price' => 'required|numeric|min:1',
            'qty' => 'required|numeric|min:1',
            'images' => 'required|array|min:1',
        ]);

        // dd($request->all());
        $images = [];
        for ($j = 0; $j < count($request->file('images')); $j++) {
            $images[] = Cloudder::upload($request->file('images')[$j], [])->getPublicId();
        }

        for ($i = 0; $i < count($request->get('sizes')); $i++) {
            Variation::create([
                'product_id' => $product->id,
                'color_id' => $request->get('colorId'),
                'size_id' => $request->get('sizes')[$i],
                'images' => implode(',', $images),
                'price' => $request->get('price'),
                'qty' => $request->get('qty'),
            ]);
        }

        return redirect(route('admin.product.variationInsert', ['id' => $product->id]))->with('success','Product Variation has been inserted successfully.');

    }    

    public function variationEdit($id)
    {
        if(!$variation = Variation::find($id)) {
            return redirect()->back();
        }

        return view('admin.productVariation.edit', [
            'variation' => $variation,
            'images' => explode(',', $variation->images)
        ]);
    }

    public function variationUpdate(Request $request, $id)
    {
        if(!$variation = Variation::find($id)) {
            return redirect()->back();
        }

        $this->validate($request, [
            'price' => 'required|numeric|min:1',
            'qty' => 'required|numeric|min:1',
            'images' => 'nullable|array|min:1',
        ]);

        if($request->file('images')[0]) {
            $images = [];
            for ($j = 0; $j < count($request->file('images')); $j++) {
                $images[] = Cloudder::upload($request->file('images')[$j], [])->getPublicId();
            }
            $variation->images = implode(',', $images); 
        }
        $variation->price = $request->get('price');
        $variation->qty = $request->get('qty');
        $variation->save();

        return redirect(route('admin.product.variationEdit', ['id' => $variation->id]))->with('success','Product Variation has been Updated successfully.');
    }

}

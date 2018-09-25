<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = new Category;
        if($request->get('id')) {
            $categories = $categories->where('parent_id', $request->get('id'));
        } else {
            $categories = $categories->where('parent_id', NULL);
        } 

        if($request->get('search')) {
            $categories = $categories->search($request->input('search'), ['name']);
        }

        return view('admin.category.index',[
            'categories' => $categories->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.category.add', ['categories' => Category::parents()->get(['name', 'id'])]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);
        
        Category::create([
            'parent_id' => $request->get('parent_id') !== 0 ? $request->get('parent_id') : 0,
            'name' => trim($request->get('name')),
            'slug' => trim(str_slug($request->get('name'))),
            'status' => $request->get('status'),
        ]);
        return redirect(route('admin.categories'))->with('success','Category has been inserted successfully.');
        
    }

    public function edit($id)
    {
        if(!$category = Category::find($id)) {
            return redirect()->back();
        }

        return view('admin.category.edit', [
            'category' => $category,
            'mainCategories' => Category::parents()->get(['name', 'id']),
        ]);
    }

    public function update(Request $request, $id)
    {
        if(!$category = Category::find($id)) {
            return redirect()->back();
        }

        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
        ]);

        $category->name = trim($request->get('name'));
        $category->slug = trim(str_slug($request->get('name')));
        if($request->get('parentId')) {
            $category->parent_id = $request->get('parentId');
        }
        $category->save();

        return redirect(route('admin.categories'))->with(['success' => 'Category Updated Successfully.']);     
    }
}



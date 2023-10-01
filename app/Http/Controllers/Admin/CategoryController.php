<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    function index()
    {
        return view('admin.category.index');
    }

    function create()
    {
        return view('admin.category.create');
    }

    function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;

        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->meta_title = $validatedData['meta_title'];


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/category', $image_name);
            $category->image = $image_name;
        }


        $category->meta_description = $validatedData['meta_description'];
        $category->meta_keywords = $validatedData['meta_keywords'];
        $category->status = $request->status == true ? 1 : 0;


        $category->save();


        return redirect()->route('admin.category')->with('success', 'category created successfully');
    }

    function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    function update(CategoryFormRequest $request, Category $category)
    {
        $category = Category::findOrFail($category->id);

        $validatedData = $request->validated();

        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->meta_title = $validatedData['meta_title'];


        if ($request->hasFile('image')) {
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/category', $image_name);
            $category->image = $image_name;
        }


        $category->meta_description = $validatedData['meta_description'];
        $category->meta_keywords = $validatedData['meta_keywords'];
        $category->status = $request->status == true ? 1 : 0;


        $category->update();


        return redirect()->route('admin.category')->with('success', 'category deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'meta_title' => $validatedData['meta_title'],
            'meta_description' => $validatedData['meta_description'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'status' => $request->status == true ? 1 : 0,
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? 1 : 0,
            'small_description' => $validatedData['small_description'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $imageName = Str::random(10) . '.' . $extension;
                $imageFile->move($uploadPath, $imageName);
                $finalImagePathName = $uploadPath . $imageName;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('/admin/products')->with('success', 'Product created successfully');
    }

    function edit(int $productId)
    {
        $product = Product::findOrFail($productId);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
            ->products()
            ->where('id', $product_id)
            ->first();

        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'meta_title' => $validatedData['meta_title'],
                'meta_description' => $validatedData['meta_description'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'status' => $request->status == true ? 1 : 0,
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? 1 : 0,
                'small_description' => $validatedData['small_description'],
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $imageName = Str::random(10) . '.' . $extension;
                    $imageFile->move($uploadPath, $imageName);
                    $finalImagePathName = $uploadPath . $imageName;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            return redirect('/admin/products')->with('success', 'Product updated successfully');
        } else {
            return redirect('admin/products')->with('error', 'Product not found');
        }
    }

    function destroyImage(int $product_image_id)  {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('success', 'Product image deleted successfully');
    }

    function destroy(int $product_id) {
        $product = Product::findOrFail($product_id);
        if ($product->productImages()->exists()) {
            foreach ($product->productImages as $productImage) {
                if (File::exists($productImage->image)) {
                    File::delete($productImage->image);
                }
                $productImage->delete();
            }
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}

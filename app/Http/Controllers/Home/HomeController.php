<?php

namespace App\Http\Controllers\Home;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(8)->get();
        return view('home.index', compact('sliders', 'trendingProducts'));
    }

    public function categories()
    {
        $categories = Category::where('status', 1)->get();
        return view('home.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            return view('home.collections.product.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $product = $category->products()->where('slug', $product_slug)->where('status', '1')->first();
        if ($product) {
            return view('home.collections.product.view', compact('product', 'category'));
        } else {
            return redirect()->back();
        }
    }

    function thankYou()
    {
        return view('home.thank-you');
    }
}

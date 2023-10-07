<?php

namespace App\Http\Controllers\Home;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        return view('home.index', compact('sliders'));
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
}

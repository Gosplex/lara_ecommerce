<?php

namespace App\Http\Controllers\Home;

use App\Models\Slider;
use App\Models\Message;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(8)->get();
        $newArrivals = Product::latest()->take(8)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(8)->get();
        $categories = Category::all();
        return view('home.index',
                compact('sliders',
                        'trendingProducts',
                        'newArrivals',
                        'featuredProducts',
                        'categories'
                    ));
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

    function newArrivals()
    {
        $newArrivals = Product::latest()->take(8)->get();
        return view('home.pages.new-arrivals', compact('newArrivals'));
    }

    function featuredProducts()
    {
        $featuredProducts = Product::where('featured', '1')->latest()->take(8)->get();
        return view('home.pages.featured-products', compact('featuredProducts'));
    }

    function productCatDisplay()
    {
        $productView = Product::where('category_id', '4')->latest()->take(8)->get();
        return view('home.pages.catProduct-view', compact('productView'));
    }

    function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->paginate(12);
        return view('home.pages.search', compact('products'));
    }

    function aboutUs()
    {
        return view('home.pages.about-us');
    }

    function contactUs()
    {
        return view('home.pages.contact-us');
    }

    function contactUsPost(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        ]);

        Message::create($data);

        return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you soon.');
    }

    function blogs()
    {
        $blogCategory = BlogCategory::all();


        $category = BlogCategory::with(['post' => function ($query) {
            $query->latest();
        }])->where('slug', 'products')->first();

        $category1 = BlogCategory::with(['post' => function ($query) {
            $query->latest();
        }])->where('slug', 'how-to')->first();

        $category2 = BlogCategory::with(['post' => function ($query) {
            $query->latest();
        }])->where('slug', 'client-yarn')->first();

        $category3 = BlogCategory::with(['post' => function ($query) {
            $query->latest();
        }])->where('slug', 'industry')->first();

        $breakingPost = BlogPost::where('breaking_news','=','1')->latest()->take(4)->get();;

        $featuredPost = BlogPost::where('featured_news','=','1')->latest()->take(8)->get();

        $latestPosts = BlogPost::where('latest_news', '=', '1')->latest()->take(8)->get();

        $trendingPosts = BlogPost::where('trending_news','=','1')->latest()->take(4)->get();

        $sliders = Slider::where('blog_slider', 1)->get();


        return view('home.pages.blogs',
        compact('blogCategory',
                'category',
                'category1',
                'category2',
                'category3',
                'breakingPost',
                'featuredPost',
                'latestPosts',
                'trendingPosts',
                'sliders'
            ));
    }
}

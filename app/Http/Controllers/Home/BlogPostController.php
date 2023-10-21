<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPostController extends Controller
{
    function show(int $blogPost)
    {
        $blogpost = BlogPost::findOrFail($blogPost);
        $trendingPosts = BlogPost::where('trending_news', '=', '1')->latest()->take(4)->get();
        $blogCategory = BlogCategory::all();
        return view('home.blogs.posts.show-post',
        compact('blogpost',
            'trendingPosts',
            'blogCategory'
        ));
    }
}

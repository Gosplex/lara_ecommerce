<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy("created_at", "desc")->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }


    public function showCategory()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.show-category', compact('categories'));
    }


    public function createBlogCategory()
    {
        return view('admin.blog.create-category');
    }

    public function editBlogCategory(BlogCategory $blogCategory)
    {
        $blogCat = BlogCategory::findOrfail($blogCategory->id);
        return view('admin.blog.edit-category', compact('blogCat'));
    }


    public function storeBlogCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:blog_category',
            'description' => 'required',
            'status' => 'required'
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == true ? 1 : 0;
        $category->save();

        return redirect()->route('admin.blogs.showCategory')->with('success', 'Blog Category Created Successfully');
    }

    function updateBlogCategory(Request $request, BlogCategory $blogCategory)
    {

        $category = BlogCategory::findOrFail($blogCategory->id);

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);


        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == true ? 1 : 0;

        $category->update();

        return redirect()->route('admin.blogs.showCategory')->with('success', 'Blog Category Updated Successfully');
    }

    function deleteBlogCategory(Request $request, BlogCategory $blogCategory)
    {
        $category = BlogCategory::findOrFail($blogCategory->id);
        $category->delete();

        return redirect()->route('admin.blogs.showCategory')->with('success', 'Blog Category Deleted Successfully');
    }

    function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.posts.write-post', compact('categories'));
    }

    function store(Request $request)
    {
        $validatedData =  $request->validate([
            'blog_title' => 'required',
            'blog_category' => 'required',
            'headline_image' => 'required',
            'blog_image_1' => 'required',
            'blog_image_2' => 'required',
            'author_image' => 'required',
            'author_name' => 'required',
            'blog_heading_1' => 'required',
            'blog_heading_2' => 'required',
            'blog_post_text_1' => 'required',
            'blog_post_text_2' => 'required',
            'blog_post_text_3' => 'required',
            'breaking_news' => 'required',
            'featured_news' => 'required',
            'latest_news' => 'required',
            'trending_news' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('headline_image')) {
            $file = $request->file('headline_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/headline_image', $fileName);
            $validatedData['headline_image'] = 'uploads/posts/headline_image/' . $fileName;
        }

        if ($request->hasFile('blog_image_1')) {
            $file = $request->file('blog_image_1');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/blog_image_1', $fileName);
            $validatedData['blog_image_1'] = 'uploads/posts/blog_image_1/' . $fileName;
        }

        if ($request->hasFile('blog_image_2')) {
            $file = $request->file('blog_image_2');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/blog_image_2', $fileName);
            $validatedData['blog_image_2'] = 'uploads/posts/blog_image_2/' . $fileName;
        }

        if ($request->hasFile('author_image')) {
            $file = $request->file('author_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/author_image', $fileName);
            $validatedData['author_image'] = 'uploads/posts/author_image/' . $fileName;
        }

        $validatedData['status'] = $request->has('status') ? 1 : 0;
        $validatedData['breaking_news'] = $request->has('breaking_news') ? 1 : 0;
        $validatedData['featured_news'] = $request->has('featured_news') ? 1 : 0;
        $validatedData['latest_news'] = $request->has('latest_news') ? 1 : 0;
        $validatedData['trending_news'] = $request->has('latest_news') ? 1 : 0;


        BlogPost::create($validatedData);

        return redirect()->route('admin.blogs.view')->with('success', 'Posted Successfully!');
    }

    function edit(int $blogposts)
    {
        $blogPost = BlogPost::findOrfail($blogposts);
        $categories = BlogCategory::all();
        return view('admin.blog.posts.edit-post', compact('blogPost', 'categories'));
    }

    function update(Request $request, int $blogpost)
    {

        $validatedData =  $request->validate([
            'blog_title' => 'required',
            'blog_category' => 'required',
            'headline_image' => 'nullable',
            'blog_image_1' => 'nullable',
            'blog_image_2' => 'nullable',
            'author_image' => 'nullable',
            'author_name' => 'required',
            'blog_heading_1' => 'required',
            'blog_heading_2' => 'required',
            'blog_post_text_1' => 'required',
            'blog_post_text_2' => 'required',
            'blog_post_text_3' => 'required',
            'breaking_news' => 'required',
            'featured_news' => 'required',
            'latest_news' => 'required',
            'trending_news' => 'required',
            'status' => 'required',
        ]);

        $post = BlogPost::findOrFail($blogpost);

        if ($request->hasFile('headline_image')) {
            $file = $request->file('headline_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/headline_image', $fileName);
            $post->headline_image = 'uploads/posts/headline_image/' . $fileName;

            $path = 'uploads/posts/headline_image' . $post->headline_image;

            if (File::exists(public_path($path))) {
                File::delete(public_path($path));
            }
        }

        if ($request->hasFile('blog_image_1')) {
            $file = $request->file('blog_image_1');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/blog_image_1', $fileName);
            $post->blog_image_1 = 'uploads/posts/blog_image_1/' . $fileName;


            $path = 'uploads/posts/blog_image_1' . $post->blog_image_1;

            if (File::exists(public_path($path))) {
                File::delete(public_path($path));
            }
        }

        if ($request->hasFile('blog_image_2')) {
            $file = $request->file('blog_image_2');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/blog_image_2', $fileName);
            $post->blog_image_2 = 'uploads/posts/blog_image_2/' . $fileName;

            $path = 'uploads/posts/blog_image_2' . $post->blog_image_2;

            if (File::exists(public_path($path))) {
                File::delete(public_path($path));
            }
        }

        if ($request->hasFile('author_image')) {
            $file = $request->file('author_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/posts/author_image', $fileName);
            $post->author_image = 'uploads/posts/author_image/' . $fileName;


            $path = 'uploads/posts/author_image' . $post->author_image;

            if (File::exists(public_path($path))) {
                File::delete(public_path($path));
            }
        }

        $post->blog_title = $validatedData['blog_title'];
        $post->blog_category = $validatedData['blog_category'];
        $post->author_name = $validatedData['author_name'];
        $post->blog_heading_1 = $validatedData['blog_heading_1'];
        $post->blog_heading_2 = $validatedData['blog_heading_2'];
        $post->blog_post_text_1 = $validatedData['blog_post_text_1'];
        $post->blog_post_text_2 = $validatedData['blog_post_text_2'];
        $post->blog_post_text_3 = $validatedData['blog_post_text_3'];
        $post->status = $request->status == true ? 1 : 0;
        $post->breaking_news = $request->breaking_news == true ? 1 : 0;
        $post->featured_news = $request->featured_news == true ? 1 : 0;
        $post->latest_news = $request->lastest_news == true ? 1 : 0;
        $post->trending_news = $request->treanding_news == true ? 1 : 0;


        $post->update();

        return redirect()->route('admin.blogs.view')->with('success', 'Post Updated Successfully!');
    }
}

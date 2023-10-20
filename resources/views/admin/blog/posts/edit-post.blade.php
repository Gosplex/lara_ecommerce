@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Edit Blog Post
                        <a href="{{ url('admin/blogs/view') }}" class="btn btn-danger btn-sm float-end text-white">
                            BACK
                        </a>
                        </h4>
                </div>
                <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('admin/blogs/' . $blogPost->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Blog Title</label>
                                <textarea name="blog_title" rows="3" class="form-control">{{ $blogPost->blog_title }}</textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Blog Category</label>
                                <select name="blog_category" class="form-select">
                                    <option value="">== Select Category ==</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $blogPost->blog_category ? 'selected' : '' }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Headline Image</label>
                                <input type="file" name="headline_image" class="form-control">
                                @if (public_path($blogPost->headline_image))
                                    <div class="mt-3">
                                        <img src="{{ asset("$blogPost->headline_image") }}"
                                            style="width: 100px; height: 60px;">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Blog Image #1</label>
                                <input type="file" name="blog_image_1" class="form-control">
                                @if (public_path($blogPost->blog_image_1))
                                    <div class="mt-3">
                                        <img src="{{ asset("$blogPost->blog_image_1") }}"
                                            style="width: 100px; height: 60px;">
                                    </div>
                                @else
                                    <div>No Image Uploaded</div>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Blog Image #2</label>
                                <input type="file" name="blog_image_2" class="form-control">
                                @if (public_path($blogPost->blog_image_2))
                                    <div class="mt-3">
                                        <img src="{{ asset("$blogPost->blog_image_2") }}"
                                            style="width: 100px; height: 60px;">
                                    </div>
                                @else
                                    <div>No Image Uploaded</div>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Author Image #1</label>
                                <input type="file" name="author_image" class="form-control">
                                @if (public_path($blogPost->author_image))
                                    <div class="mt-3">
                                        <img src="{{ asset("$blogPost->author_image") }}"
                                            style="width: 100px; height: 60px;">
                                    </div>
                                @else
                                    <div>No Image Uploaded</div>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Author Name</label>
                                <input type="text" name="author_name" value="{{ $blogPost->author_name }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>First Heading</label>
                                <textarea name="blog_heading_1" rows="3" class="form-control">{{ $blogPost->blog_heading_1 }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Second Heading</label>
                                <textarea name="blog_heading_2" rows="3" class="form-control">{{ $blogPost->blog_heading_2 }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Blog Post Text #1</label>
                                <textarea name="blog_post_text_1" rows="3" class="form-control">{{ $blogPost->blog_post_text_1 }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Blog Post Text #2</label>
                                <textarea name="blog_post_text_2" rows="3" class="form-control">{{ $blogPost->blog_post_text_2 }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Blog Post Text #3</label>
                                <textarea name="blog_post_text_3" rows="3" class="form-control">{{ $blogPost->blog_post_text_3 }}</textarea>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Breaking News</label>
                                <input type="checkbox" {{ $blogPost->breaking_news == '1' ? 'checked' : '' }}
                                    name="breaking_news">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Featured News</label>
                                <input type="checkbox" {{ $blogPost->featured_news == '1' ? 'checked' : '' }}
                                    name="featured_news">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Latest News</label>
                                <input type="checkbox" {{ $blogPost->latest_news == '1' ? 'checked' : '' }}
                                    name="latest_news">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Trending News</label>
                                <input type="checkbox" {{ $blogPost->trending_news == '1' ? 'checked' : '' }}
                                    name="trending_news">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Status</label>
                                <input type="checkbox" {{ $blogPost->status == '1' ? 'checked' : '' }} name="status">
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary text-white">Update Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

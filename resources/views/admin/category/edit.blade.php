@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm float-end text-white">Back
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ url('admin/category/' . $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" />
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $category->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" />
                            <img src="{{ asset('uploads/category/' . $category->image) }}" class="mt-2" alt=""
                                width="60px" height="60px" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title"
                                value="{{ $category->meta_title }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="3">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keywords" rows="3">{{ $category->meta_keywords }}</textarea>
                            @error('meta_keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div>
                                <input class="form-check-input " type="checkbox" name="status"
                                    {{ $category->status == '1' ? 'checked' : '' }} />
                                <label class="form-check-label ml-3">
                                    Product Status
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary text-white float-end">Edit Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Add Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm float-end text-white">Back
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" />
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" />
                            @error('slug')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="3"></textarea>
                            @error('meta_description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keywords" rows="3"></textarea>
                            @error('meta_keywords')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div>
                                <input class="form-check-input " type="checkbox"  name="status"/>
                                <label class="form-check-label ml-3">
                                    Product Status
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary text-white float-end">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

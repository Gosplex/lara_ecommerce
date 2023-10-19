@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Edit Category
                        <a href="{{ url('admin/blogs/category') }}" class="btn btn-primary btn-sm float-end text-white">Back
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ url('admin/blogs/category/' . $blogCat->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $blogCat->name }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ $blogCat->slug }}" />
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $blogCat->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div>
                                <input class="form-check-input" {{ $blogCat->status == '1' ? 'checked' : '' }}
                                    type="checkbox" name="status" />
                                <label class="form-check-label ml-3">
                                    Status
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary text-white float-end">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

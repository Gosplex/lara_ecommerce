@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Blog Category Lists
                        <a href="{{ url('admin/blogs/category/create') }}" class="btn btn-primary btn-sm float-end text-white">
                            Add Blog Category
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Slug</th>
                                    <th>Category Description</th>
                                    <th>Category Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug}}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            @if ($category->status == '1')
                                                <span class="badge bg-success">Available</span>
                                            @else
                                                <span class="badge bg-danger">Unavailable</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/blogs/category/edit/' . $category->id) }}"
                                                class="btn btn-primary text-white">Edit</a>
                                            <a href="{{ url('admin/blogs/category/delete/' . $category->id) }}"
                                                class="btn btn-danger text-white" onclick="return confirm('Are you sure you want to delete this category ?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                    <h3 class="mt-1">Blog Post
                        <a href="{{ url('admin/blogs/create') }}" class="btn btn-primary btn-sm float-end text-white">
                            Add Post
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Post Category</th>
                                    <th>Author Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td>{{ $post->blog_title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->author_name }}</td>
                                        <td>
                                            @if ($post->status == '1')
                                                <span class="badge bg-danger">Live</span>
                                            @else
                                                <span class="badge bg-info">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/blogs/edit/' . $post->id) }}"
                                                class="btn btn-primary text-white btn-sm">Edit</a>
                                            <a href="{{ url('admin/products/delete/' . $post->id) }}"
                                                class="btn btn-danger text-white btn-sm"
                                                onclick="return confirm('Are you sure you want to delete product ?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Blog Post Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                    <h3 class="mt-1">Add Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-primary btn-sm float-end text-white">
                            BACK
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="col-md-4">
                            <input class="form-check-input" type="checkbox" name="status">
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>

                        <div class="col-md-4 mt-3">
                            <input class="form-check-input" type="checkbox" name="blog_slider">
                            <label class="form-check-label" for="blog_slider">
                                Mark as Blog Slider
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 float-end text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

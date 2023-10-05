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
                    <h3 class="mt-1">Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-primary btn-sm float-end text-white">
                            BACK
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="10" class="form-control">{{ $slider->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                            <img class="mt-3" src="{{ asset("$slider->image") }}" alt="{{ $slider->title }}"
                                style="width: 100px; height: 70px;">
                        </div>

                        <div class="">
                            <input class="form-check-input" type="checkbox" name="status"
                                {{ $slider->status == '1' ? 'checked' : 'unchecked' }}>
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 float-end text-white">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                    <h3 class="mt-1">Slider Lists
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end text-white">
                            Add Slider
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>
                                            <img src="{{ asset("$slider->image") }}" alt="{{ $slider->title }}"
                                                style="width: 70px; height: 70px;">
                                        </td>
                                        <td>
                                            @if ($slider->status == '1')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">DeActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/sliders/edit/' . $slider->id) }}"
                                                class="btn btn-primary btn-sm text-white">Edit</a>
                                            <a href="{{ url('admin/sliders/delete/' . $slider->id) }}"
                                                class="btn btn-danger btn-sm text-white"
                                                onclick="return confirm('Are you sure you want to delete this slider ?')">Delete</a>
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

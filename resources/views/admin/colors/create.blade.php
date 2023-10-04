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
                    <h3 class="mt-1">Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm float-end text-white">
                            BACK
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/create') }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Color Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" aria-describedby="basic-addon1">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Color Code</span>
                            </div>
                            <input type="text" class="form-control" name="code">
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="">
                            <input class="form-check-input" type="checkbox" name="status">
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 float-end text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end text-white">
                            Add Products
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection

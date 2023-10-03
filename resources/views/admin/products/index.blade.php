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
                    <h3 class="mt-1">Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end text-white">
                            Add Products
                        </a>
                        </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @if ($product->status == '1')
                                                <span class="badge bg-success">Available</span>
                                            @else
                                                <span class="badge bg-danger">Unavailable</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/products/edit/' . $product->id) }}"
                                                class="btn btn-primary text-white btn-sm">Edit</a>
                                            <a href="{{ url('admin/products/delete/' . $product->id) }}"
                                                class="btn btn-danger text-white btn-sm"
                                                onclick="return confirm('Are you sure you want to delete product ?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Product Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $brands->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

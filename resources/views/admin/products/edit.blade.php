@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mt-1">Edit Products
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm float-end text-white">
                            BACK
                        </a>
                        </h4>
                </div>
                <div class="card-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close float-end" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag"
                                    aria-selected="false">SEO
                                    Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details"
                                    aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image"
                                    aria-selected="false">Upload Product
                                    Image</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color"
                                    aria-selected="false">Produt Colors</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="mb-3">
                                    <label class="mt-3 mb-1">Choose Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                                </div>
                                <div class="mb-3">
                                    <label>Select Brands</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Small Description (500 Words)</label>
                                    <input type="text" name="small_description" class="form-control"
                                        value="{{ $product->small_description }}">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ $product->description }}">
                                </div>
                            </div>
                            {{-- SEOTAGS --}}
                            <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                                aria-labelledby="seotag-tab">
                                <div class="mb-3 mt-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $product->meta_title }}">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control"
                                        value="{{ $product->meta_description }}">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control"
                                        value="{{ $product->meta_keyword }}">
                                </div>
                            </div>
                            {{-- DETAILS TAG --}}
                            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="mt-3 mb-1">Original Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">₹</span>
                                            <input type="text" class="form-control"
                                                aria-label="Amount (to the nearest INR)" name="original_price"
                                                value="{{ $product->original_price }}">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mt-3 mb-1">Selling Price Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">₹</span>
                                            <input type="text" class="form-control"
                                                aria-label="Amount (to the nearest INR)" name="selling_price"
                                                value="{{ $product->selling_price }}">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mt-3">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" class="form-control"
                                                value="{{ $product->quantity }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending"
                                                {{ $product->trending == '1' ? 'checked' : '' }}
                                                style="width: 20px; height: 20px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" name="status"
                                                {{ $product->status == '1' ? 'checked' : '' }}
                                                style="width: 20px; height: 20px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- IMAGE TAG --}}
                            <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab">
                                <div class="mb-3 mt-3">
                                    <label>Upload Product Images</label>
                                    <input name="image[]" multiple type="file" class="form-control">
                                </div>
                                <div>
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <div class="image-container">
                                                        <img src="{{ asset($image->image) }}"
                                                            style="height: 80px; width: 80px;" class="me-4 border">
                                                        <a
                                                            href="{{ url('admin/product-image/' . $image->id . '/delete') }}">
                                                            <i class="fa-regular fa-circle-xmark d-block close-img"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="alert alert-danger">No Image Found</div>
                                    @endif
                                </div>
                            </div>
                            {{-- COLOR TAG --}}
                            <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab">
                                <div class="mb-3 mt-3">
                                    <h4>Choose Product Color</h4>
                                    <div class="row">
                                        @forelse ($colors as $color)
                                            <div class="col-md-6 mt-3">
                                                <div class="p-2 border">
                                                    <b>Color:</b> <input name="colors[{{ $color->id }}]"
                                                        value="{{ $color->id }}" type="checkbox"> {{ $color->name }}
                                                    <br>
                                                    <b>Quantity:</b> <input type="number"
                                                        name="colorquantity[{{ $color->id }}]"
                                                        style="border: 1px solid; width: 70px;">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h4 class="text-danger">No Color Found</h4>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                <hr>

                                <h4 class="mt-3">Existing Product Colors</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Color Name</th>
                                                <th class="text-center">Color Quantity</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($prodColor->color->name)
                                                            {{ $prodColor->color->name }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="text" value="{{ $prodColor->quantity }}"
                                                                class="productColorQuantity form-control form-control-sm">
                                                            <button type="button" value="{{ $prodColor->id }}"
                                                                class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $prodColor->id }}"
                                                            class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="btn btn-primary text-white mt-5 float-end">Update</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection



    @section('scripts')
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.updateProductColorBtn', function() {
                    var product_id = '{{ $product->id }}'
                    var id = $(this).val();
                    var quantity = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                    if (quantity == '' || quantity == null) {
                        alert('Please Enter Quantity');
                        return false;
                    }

                    var data = {
                        'product_id': product_id,
                        'qty': quantity,
                    }
                    $.ajax({
                        url: "/admin/product-color-update/" + id,
                        type: "POST",
                        data: data,
                        success: function(response) {
                            alert(response.message);
                        }
                    });
                });

                $(document).on('click', '.deleteProductColorBtn', function() {
                    var id = $(this).val();
                    var thisClick = $(this);


                    $.ajax({
                        url: "/admin/product-color-delete/" + id,
                        type: "GET",
                        success: function(response) {
                            thisClick.closest('.prod-color-tr').remove();
                            alert(response.message)
                        }
                    });
                });
            });
        </script>
    @endsection

@extends('layouts.app')



@section('title', 'New Arrivals')



@section('content')

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-2">New Arrivals</h4>
                    <div class="underline"></div>
                    <div class="mb-3"></div>
                </div>
                @forelse ($newArrivals as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-success">New</label>
                                <a
                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                        alt="{{ $productItem->name }}" class="product-img" />
                                </a>
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                    <a href="">
                                        HP Laptop
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">₹{{ $productItem->selling_price }}</span>
                                    <span class="original-price">₹{{ $productItem->original_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Product Found</h4>
                        </div>
                    </div>
                @endforelse

                <div class="text-center">
                    <a href="{{ url('/collections') }}" class="btn btn-warning px-3 text-white fw-3">View All</a>
                </div>
            </div>
        </div>
    </div>

@endsection

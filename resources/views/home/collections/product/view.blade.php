@extends('layouts.app')

@section('title')
    {{ $product->meta_title }}
@endsection



@section('content')
    <div>
        <livewire:home.product.view :category="$category" :product="$product" />
    </div>
@endsection

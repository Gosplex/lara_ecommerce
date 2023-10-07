@extends('layouts.app')

@section('title')
    {{ $category->name }}
@endsection


@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <livewire:home.product.index :category="$category" />
            </div>
        </div>
    </div>
@endsection

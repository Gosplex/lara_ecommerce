@extends('layouts.app')

@section('title', 'Home')


@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-hero">
                        <div class="featured-carousel owl-carousel">
                            @foreach ($sliders as $slider)
                                <div class="item">
                                    <div class="work">
                                        <div class="img d-flex align-items-center justify-content-center"
                                            style="background-image: url({{ asset("$slider->image") }});">
                                            <div class="text text-center">
                                                <h2>Discover New Places</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="my-5 text-center">
                            <ul class="thumbnail">
                                @foreach ($sliders as $slider)
                                    <li><a href="#"><img src="{{ asset("$slider->image") }}" alt="Image"
                                                class="img-fluid"></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

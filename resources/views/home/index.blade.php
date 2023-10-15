@extends('layouts.app')

@section('title', 'Home')


@section('content')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {{ $sliderItem->title }}
                            </h1>
                            <p>
                                {{ $sliderItem->description }}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Majestic Stores 👋</h4>
                    <div class="underline mx-auto"></div>
                    <p> Your gateway to an unparalleled shopping experience. We believe in making every visit a regal
                        journey, where you are treated like royalty. Explore our aisles and discover a world of premium
                        products, unmatched service, and the grandeur of convenience. Join us on a majestic retail adventure
                        that goes beyond the ordinary, where your satisfaction reigns supreme.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-2">Trending Products</h4>
                    <div class="underline"></div>
                    <div class="mb-3"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme owl-carousel">
                        @foreach ($trendingProducts as $productItem)
                            <div class="item">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-2">New Arrivals
                        <a href="{{ url('/new-arrivals') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>
                    <div class="mb-3"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme owl-carousel">
                        @foreach ($newArrivals as $productItem)
                            <div class="item">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-2">Featured Products
                        <a href="{{ url('/featured-products') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline"></div>
                    <div class="mb-3"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme owl-carousel">
                        @foreach ($featuredProducts as $productItem)
                            <div class="item">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


@section('script')

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>


@endsection

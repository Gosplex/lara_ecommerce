@extends('layouts.app')

@section('title', $websiteSetting->title)

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
                    <h4 class="mb-2">Categories</h4>
                    <div class="underline"></div>
                    <div class="mb-3"></div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme owl-carousel">
                        @foreach ($categories as $category)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <a href="{{ url('/collections/' . $category->slug) }}">
                                            <img src="{{ asset('uploads/category/' . $category->image) }}"
                                                alt="{{ $category->name }}" class="product-img" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="product-card-body">
                                        <h4 class="product-name text-center">
                                            <a href="{{ url('/collections/' . $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        </h4>
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
                                        <label class="stock bg-success">Trend</label>
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
                                                {{ $productItem->name }}
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
                                        <label class="stock bg-info">New</label>
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
                                                {{ $productItem->name }}
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
                                        <label class="stock bg-warning">Feature</label>
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
                                                {{ $productItem->name }}
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

    {{-- About US Section --}}
    <div class="bg-light">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1 class="display-4">{{ $websiteSetting->about_text_1 }}</h1>
                    <p class="lead text-muted">
                        {{ $websiteSetting->long_text_1 }}
                    </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block"><img src="https://bootstrapious.com/i/snippets/sn-about/illus.png"
                        alt="" class="img-fluid"></div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">{{ $websiteSetting->about_text_2 }}</h2>
                    <p class="font-italic text-muted mb-4">{{ $websiteSetting->long_text_2 }}</p><a href="#"
                        class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img
                        src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt=""
                        class="img-fluid mb-4 mb-lg-0"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg"
                        alt="" class="img-fluid mb-4 mb-lg-0"></div>
                <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                    <h2 class="font-weight-light">{{ $websiteSetting->about_text_3 }}</h2>
                    <p class="font-italic text-muted mb-4">{{ $websiteSetting->long_text_3 }}</p><a href="#"
                        class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-5">
                    <h2 class="display-4 font-weight-light">Our team</h2>
                    <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="row text-center">
                <!-- Team item-->
                @foreach ($teamDetails as $team)
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                src="{{ asset('uploads/team_images/' . $team->team_image) }}" alt=""
                                width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">{{ $team->team_name }}</h5><span
                                class="small text-uppercase text-muted">{{ $team->team_title }}</span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="{{ url($team->team_facebook) }}"
                                        class="social-link"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="{{ url($team->team_twitter) }}"
                                        class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="{{ url($team->team_instagram) }}"
                                        class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="{{ url($team->team_linkedin) }}"
                                        class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                <!-- End-->

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

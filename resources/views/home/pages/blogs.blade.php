@extends('layouts.app')



@section('content')
    <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach ($sliders as $slider)
                        <div class="position-relative overflow-hidden" style="height: 500px">
                            <img class="img-fluid h-100" src="{{ asset("$slider->image") }}" style="object-fit: cover" />
                            <div class="overlay">
                                <p class="h2 m-0 text-white text-uppercase font-weight-bold">
                                    {{ $slider->title }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    <div class="col-md-6 px-0">
                        @php
                            $latestPost = $category->post->first();
                            $latestPost1 = $category1->post->first();
                            $latestPost2 = $category2->post->first();
                            $latestPost3 = $category3->post->first();
                        @endphp
                        <div class="position-relative overflow-hidden" style="height: 250px">
                            <img class="img-fluid w-100 h-100" src="{{ asset("$latestPost->headline_image") }}"
                                style="object-fit: cover" />
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">{{ $category->name }}</a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                    href="{{ url('/blogs/' . $latestPost->id) }}">{{ $latestPost->blog_title }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px">
                            <img class="img-fluid w-100 h-100" src="{{ asset("$latestPost1->headline_image") }}"
                                style="object-fit: cover" />
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">{{ $category1->name }}</a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                    href="{{ url('/blogs/' . $latestPost1->id) }}">{{ $latestPost1->blog_title }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px">
                            <img class="img-fluid w-100 h-100" src="{{ asset("$latestPost2->headline_image") }}"
                                style="object-fit: cover" />
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">{{ $category2->name }}</a>
                                    <a class="text-white" href=""><small></small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                    href="{{ url('/blogs/' . $latestPost2->id) }}">{{ $latestPost2->blog_title }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="position-relative overflow-hidden" style="height: 250px">
                            <img class="img-fluid w-100 h-100" src="{{ asset("$latestPost3->headline_image") }}"
                                style="object-fit: cover" />
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">{{ $category3->name }}</a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                    href="{{ url('/blogs/' . $latestPost3->id) }}">{{ $latestPost3->blog_title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-bold py-2 text-uppercase"
                            style="width: 170px">
                            Breaking News
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px">
                            @foreach ($breakingPost as $breaking)
                                <div class="text-truncate">
                                    <a class="text-white text-uppercase font-weight-semi-bold" href="">
                                        {{ $breaking->blog_title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                @foreach ($featuredPost as $featured)
                    <div class="position-relative overflow-hidden" style="height: 300px">
                        <img class="img-fluid h-100" src="{{ asset("$featured->headline_image") }}"
                            style="object-fit: cover" />
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">{{ $featured->category->name }}</a>
                                <a class="text-white"
                                    href=""><small>{{ $featured->created_at->format('M d, Y') }}</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ url('/blogs/' . $featured->id) }}">
                                {{ $featured->blog_title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">
                                    Latest News
                                </h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>
                        </div>
                        @foreach ($latestPosts as $latest)
                            <div class="col-lg-6 mb-3">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ $latest->headline_image }}"
                                        style="object-fit: cover" />
                                    <div class="bg-white border border-top-0 p-4 rounded-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="">{{ $latest->category->name }}</a>
                                            <a class="text-body"
                                                href=""><small>{{ $latest->created_at->format('M d, Y') }}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold text-truncate"
                                            href="{{ url('/blogs/' . $latest->id) }}">{{ $latest->blog_title }}</a>
                                        <p class="m-0 custom-line-clamp-3">
                                            {{ $latest->blog_post_text_1 }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between rounded-0 bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{ asset("$latest->author_image") }}"
                                                width="25" height="25" alt="" />
                                            <small>{{ $latest->author_name }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="fa fa-eye mr-2"></i>12345</small>
                                            <small class="ml-3"><i class="fa fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">
                                Trending News
                            </h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3 rounded-0">
                            @foreach ($trendingPosts as $trending)
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px">
                                    <div
                                        class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                                href="">{{ $trending->category->name }}</a>
                                            <a class="text-body"
                                                href=""><small>{{ $trending->created_at->format('M d, Y') }}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold text-truncate"
                                            href="{{ url('/blogs/' . $trending->id) }}">
                                            {{ $trending->blog_title }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3 rounded-0">
                            <p>
                                Aliqu justo et labore at eirmod justo sea erat diam dolor diam
                                vero kasd
                            </p>
                            <div class="input-group mb-2" style="width: 100%">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3 rounded-0">
                            <div class="d-flex flex-wrap m-n1">
                                @foreach ($blogCategory as $blogCat)
                                    <a href=""
                                        class="btn btn-sm btn-outline-secondary m-1">{{ $blogCat->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>
@endsection

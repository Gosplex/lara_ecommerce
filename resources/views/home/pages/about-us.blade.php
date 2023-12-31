@extends('layouts.app')

@section('title', 'About Us')



@section('content')

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
                                src="{{ asset('uploads/team_images/' . $team->team_image) }}" alt="" width="100"
                                class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
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

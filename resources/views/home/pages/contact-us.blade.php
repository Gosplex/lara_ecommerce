@extends('layouts.app')


@section('title', 'Contact Us')



@section('content')


    <div>
        <div class="content mt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row justify-content-center">
                            <div class="col-md-6">

                                <h3 class="heading mb-4">Let's talk about everything!</h3>
                                <div class="mt-3">
                                    <p><span class="d-block"><i class="fa fa-map-marker" aria-hidden="true"></i></span> <span>
                                            {{ $websiteSetting->company_address }}</span></p>
                                    <p><span class="d-block"><i class="fa fa-phone" aria-hidden="true"></i></span> <span>
                                            {{ $websiteSetting->phone_1 }}</span></p>
                                    <p><span class="d-block"><i class="fa fa-envelope" aria-hidden="true"></i></span> <span>
                                            {{ $websiteSetting->email_1 }}</span></p>
                                    <p>
                                        <span class="d-block fw-300">Socials:</span>
                                        <span>
                                            <a href="{{ url($websiteSetting->facebook) }}" class="p-2"><span
                                                    class="fa fa-facebook"></span></a>
                                            <a href="{{ url($websiteSetting->twitter) }}" class="p-2"><span
                                                    class="fa fa-twitter"></span></a>
                                            <a href="{{ url($websiteSetting->instagram) }}" class="p-2"><span
                                                    class="fa fa-instagram"></span></a>
                                            <a href="{{ url($websiteSetting->youtube) }}" class="p-2"><span
                                                    class="fa fa-youtube"></span></a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <form class="mb-5" action="{{ url('contact-us') }}" method="POST" id="contactForm">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="message" id="message" cols="30" rows="10"
                                                placeholder="Write your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Send Message"
                                                class="btn btn-primary rounded-0 py-2 px-4">
                                            <span class="submitting"></span>
                                        </div>
                                    </div>
                                </form>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h1 class="d-flex justify-content-center mb-5 heading">Find Us on Google Map</h1>
            <iframe src="{{ url($websiteSetting->map) }}" width="1340" height="600" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>
    </div>



@endsection

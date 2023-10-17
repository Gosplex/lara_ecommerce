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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas debitis, fugit natus?
                                </p>

                                <p><img src="{{ asset('images\undraw-contact.svg') }}" alt="Image" class="img-fluid"></p>
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
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.9185317027327!2d70.7646035741587!3d22.31892064222245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c9909e845a83%3A0x4863465519cad832!2sFuerte%20Developers%20%7C%20Your%20one%20stop%20IT%20solution%20for%20complete%20IT%20and%20software%20services!5e0!3m2!1sen!2sin!4v1697532665331!5m2!1sen!2sin"
                width="1340" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>
    </div>



@endsection

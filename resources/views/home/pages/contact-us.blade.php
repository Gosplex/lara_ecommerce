@extends('layouts.app')


@section('title', 'Contact Us')



@section('content')

    <div class="content mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                        <div class="col-md-6">

                            <h3 class="heading mb-4">Let's talk about everything!</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas debitis, fugit natus?</p>

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


@endsection

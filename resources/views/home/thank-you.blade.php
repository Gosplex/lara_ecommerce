@extends('layouts.app')

@section('title', 'Thank you for shopping')


@section('content')
    <div class="jumbotron text-center pt-5">
        <h1 class="display-3">Thank You!</h1>
        <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account
            setup.</p>
        <hr>
        <p>
            Having trouble? <a href="">Contact us</a>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue to homepage</a>
        </p>
    </div>

@endsection

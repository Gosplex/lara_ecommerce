@extends('layouts.app')



@section('title', 'Profile')


@section('content')

    <div class="py-5 bg-light">
        <div class="container">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger m-3">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                class="rounded-circle mt-5" width="150px"
                                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                class="font-weight-bold">{{ Auth::user()->name }}</span><span
                                class="text-black-50">{{ Auth::user()->email }}</span><span> </span></div>
                    </div>
                    <div class="col-md-6 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                                <a href="{{ url('change-password') }}" class="btn btn-primary text-white float-end">Change
                                    Password</a>
                            </div>
                            <div class="underline"></div>

                            <form action="{{ url('profile') }}" method="POST">
                                @csrf
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels">Name</label>
                                        <input type="text" class="form-control form-design" placeholder="Full Name"
                                            value="{{ Auth::user()->name }}" name="name">
                                    </div>
                                    <div class="col-md-12"><label class="labels">Email ID</label>
                                        <input type="text" class="form-control form-design" placeholder="Enter Email ID"
                                            value="{{ Auth::user()->email }}" readonly name="email">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label>
                                        <input type="text" class="form-control form-design"
                                            placeholder="Enter Phone Number"
                                            value="{{ Auth::user()->userDetail->phone ?? ''  }}" name="phone">
                                    </div>
                                    <div class="col-md-12"><label class="labels">Postcode</label>
                                        <input type="text" class="form-control form-design"
                                            placeholder="Enter Address Postcode"
                                            value="{{ Auth::user()->userDetail->zip_code ?? '' }}" name="zip_code">
                                    </div>
                                    <div class="col-md-12"><label class="labels">Residential Address</label>
                                        <textarea class="form-control form-design" rows="3" placeholder="Enter Residential Address" name="address">
                                            {{ Auth::user()->userDetail->address  ?? ''}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

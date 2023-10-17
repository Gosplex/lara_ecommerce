@extends('layouts.admin')



@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('/admin/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" class="form-control" value="{{ $setting->website_name }}"
                                    name="website_name" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website URL</label>
                                <input type="text" class="form-control" value="{{ $setting->website_url }}"
                                    name="website_url" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Page Title</label>
                                <input type="text" class="form-control" value="{{ $setting->title }}" name="title" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website Logo</label>
                                <input type="file" class="form-control" name="logo" />
                                @if (file_exists(public_path('uploads/website_details/' . $setting->logo)))
                                    <div class="mt-3">
                                        <img src="{{ asset('uploads/website_details/' . $setting->logo) }}"
                                            style="width: 60px; height: 60px;">
                                    </div>
                                @else
                                    <h4></h4>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <textarea type="text" class="form-control" name="meta_keywords">{{ $setting->meta_keywords }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea rows="3" class="form-control" name="meta_description">{{ $setting->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Company Address</label>
                                <textarea rows="3" class="form-control" name="company_address">{{ $setting->company_address }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone #1</label>
                                <input type="text" class="form-control" value="{{ $setting->phone_1 }}" name="phone_1" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone #2</label>
                                <input type="text" class="form-control" value="{{ $setting->phone_2 }}"
                                    name="phone_2" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email #1</label>
                                <input type="text" class="form-control" value="{{ $setting->email_1 }}"
                                    name="email_1" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email #2</label>
                                <input type="text" class="form-control" value="{{ $setting->email_2 }}"
                                    name="email_2" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website Social Media Updates</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook (optional)</label>
                                <input type="text" class="form-control" name="facebook"
                                    value="{{ $setting->facebook ?? '' }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter (optional)</label>
                                <input type="text" class="form-control" name="twitter"
                                    value="{{ $setting->twitter ?? '' }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram (optional)</label>
                                <input type="text" class="form-control" name="instagram"
                                    value="{{ $setting->instagram ?? '' }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Youtube (optional)</label>
                                <input type="text" class="form-control" name="youtube"
                                    value="{{ $setting->youtube ?? '' }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection

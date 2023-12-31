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
                                <label>Favicon Image</label>
                                <input type="file" class="form-control" name="favicon_image" />
                                @if (file_exists(public_path('uploads/favicon_image/' . $setting->favicon_image)))
                                    <div class="mt-3">
                                        <img src="{{ asset('uploads/favicon_image/' . $setting->favicon_image) }}"
                                            style="width: 60px; height: 60px;">
                                    </div>
                                @else
                                    <h4></h4>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website Color Code</label>
                                <input type="text" class="form-control" value="{{ $setting->color_code }}"
                                    name="color_code" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <textarea type="text" class="form-control" name="meta_keywords">{{ $setting->meta_keywords }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <textarea rows="3" class="form-control" name="meta_description">{{ $setting->meta_description }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website Header Font</label>
                                <select name="heading_font" class="form-select">
                                    <option disabled selected>== Select Font ==</option>
                                    <option value="Poppins" @if ($selectedHeadingFont == 'Poppins') selected @endif>Poppins
                                    </option>
                                    <option value="Arial Black" @if ($selectedHeadingFont == 'Arial Black') selected @endif>Arial
                                        Black</option>
                                    <option value="Montserrat" @if ($selectedHeadingFont == 'Montserrat') selected @endif>Montserrat
                                    </option>
                                    <option value="Roboto" @if ($selectedHeadingFont == 'Roboto') selected @endif>Roboto</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website Descripton Font</label>
                                <select name="body_font" class="form-select">
                                    <option disabled selected>== Select Font ==</option>
                                    <option value="Roboto" @if ($selectedBodyFont == 'Roboto') selected @endif>Roboto</option>
                                    <option value="Open Sans" @if ($selectedBodyFont == 'Open Sans') selected @endif>Open Sans
                                    </option>
                                    <option value="Lato" @if ($selectedBodyFont == 'Lato') selected @endif>Lato</option>
                                    <option value="Georgia" @if ($selectedBodyFont == 'Georgia') selected @endif>Georgia
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Location Iframe</label>
                                <textarea rows="3" class="form-control" name="map">{{ $setting->map }}</textarea>
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
                                <input type="text" class="form-control" value="{{ $setting->phone_1 }}"
                                    name="phone_1" />
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
                        <h3 class="text-white mb-0">Website About Section</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>About Small Text #1</label>
                                <input type="text" class="form-control" value="{{ $setting->about_text_1 }}"
                                    name="about_text_1" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>About Small Text #2</label>
                                <input type="text" class="form-control" value="{{ $setting->about_text_2 }}"
                                    name="about_text_2" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>About Small Text #3</label>
                                <input type="text" class="form-control" value="{{ $setting->about_text_3 }}"
                                    name="about_text_3" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>About Image #1</label>
                                <input type="file" class="form-control" name="about_img_1" />
                                @if (file_exists(public_path('uploads/about_images/' . $setting->about_img_1)))
                                    <div class="mt-3">
                                        <img src="{{ asset('uploads/about_images/' . $setting->about_img_1) }}"
                                            style="width: 60px; height: 60px;">
                                    </div>
                                @else
                                    <h4></h4>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>About Image #2</label>
                                <input type="file" class="form-control" name="about_img_2" />
                                @if (file_exists(public_path('uploads/about_images/' . $setting->about_img_2)))
                                    <div class="mt-3">
                                        <img src="{{ asset('uploads/about_images/' . $setting->about_img_2) }}"
                                            style="width: 60px; height: 60px;">
                                    </div>
                                @else
                                    <h4></h4>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>About Image #3</label>
                                <input type="file" class="form-control" name="about_img_3" />
                                @if (file_exists(public_path('uploads/about_images/' . $setting->about_img_3)))
                                    <div class="mt-3">
                                        <img src="{{ asset('uploads/about_images/' . $setting->about_img_3) }}"
                                            style="width: 60px; height: 60px;">
                                    </div>
                                @else
                                    <h4></h4>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>About Large Text #1</label>
                                <textarea rows="3" class="form-control" name="long_text_1">{{ $setting->long_text_1 }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>About Large Text #2</label>
                                <textarea rows="3" class="form-control" name="long_text_2">{{ $setting->long_text_2 }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>About Large Text #3</label>
                                <textarea rows="3" class="form-control" name="long_text_3">{{ $setting->long_text_3 }}</textarea>
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

                <div class="text-center">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>
        </div>


        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('/admin/team') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Our Team Members</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Team Name</label>
                                <input type="text" class="form-control" value="" name="team_name" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Team Title</label>
                                <input type="text" class="form-control" value="" name="team_title" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Team Image</label>
                                <input type="file" class="form-control" name="team_image" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Facebook (optional)</label>
                                <input type="text" class="form-control" name="team_facebook" value="" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter (optional)</label>
                                <input type="text" class="form-control" name="team_twitter" value="" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram (optional)</label>
                                <input type="text" class="form-control" name="team_instagram" value="" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>LinkedIn (optional)</label>
                                <input type="text" class="form-control" name="team_linkedin" value="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection

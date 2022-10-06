@extends('app.main_master')
@section('title')
    Edit Profile | Starbuy Store
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Edit Profile</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ !empty($user->profile_photo_path) ? url($user->profile_photo_path) : asset('frontend/assets/no-image.jpg') }}"
                        class="card-img-top" style="border-radius: 50; margin-left: 30px; margin-bottom: 20px;"
                        width="100" height="100" alt="">

                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-small btn-block">Home</a>
                        <a href="{{ route('user.edit-profile') }}" class="btn btn-success btn-small btn-block">Edit
                            Profile</a>
                        <a href="" class="btn btn-info btn-small btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-small btn-block">Logout</a>
                    </ul>

                </div>

                <div class="col-md-2">
                </div>


                <div class="col-md-6 sign-in">
                    <div class="card">
                        <h3 class="text-center">
                            Hello <strong>{{ Auth::user()->name }}</strong> Edit your profile
                        </h3>
                        <form class="register-form outer-top-xs" action="{{ route('update.user-profile') }}" method="POST"
                            enctype="multipart/form-data" role="form">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" id="name" class="form-control unicase-form-control text-input"
                                    name="name" value="{{ $user->name }}" />
                                {{-- Display Validation error message --}}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" class="form-control unicase-form-control text-input"
                                    name="email" value="{{ $user->email }}" />
                                {{-- Display Validation error message --}}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="phone">Change phone number <span>*</span></label>
                                <input type="text" id="phone" class="form-control unicase-form-control text-input"
                                    name="phone" value="{{ $user->phone }}" />
                                {{-- Display Validation error message --}}
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="profile_photo_path">Change Profile Picture
                                    <span>*</span></label>
                                <input type="file" id="profile_photo_path"
                                    class="form-control unicase-form-control text-input" name="profile_photo_path" />
                                {{-- Display Validation error message --}}
                                @error('profile_photo_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button style="margin-bottom: 30px" type="submit"
                                class="btn-upper btn btn-primary checkout-page-button">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

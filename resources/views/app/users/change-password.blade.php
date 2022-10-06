@extends('app.main_master')
@section('title')
Change Password | Starbuy Store
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Change Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ !empty($userPic) ? url($userPic) : asset('frontend/assets/no-image.jpg') }}"
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

                        <form class="register-form outer-top-xs" action="{{ route('update.user-password') }}" method="POST"
                            role="form">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="current_pass">Current Password <span>*</span></label>
                                <input type="password" id="current_pass" class="form-control unicase-form-control text-input"
                                    name="current_pass"/>
                                {{-- Display Validation error message --}}
                                @error('current_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span>*</span></label>
                                <input type="password" id="password" class="form-control unicase-form-control text-input"
                                    name="password"/>
                                {{-- Display Validation error message --}}
                                @error('new_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                <input type="password" id="password_confirmation" class="form-control unicase-form-control text-input"
                                    name="password_confirmation"/>
                                {{-- Display Validation error message --}}
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <button style="margin-bottom: 30px" type="submit"
                                class="btn-upper btn btn-primary checkout-page-button">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

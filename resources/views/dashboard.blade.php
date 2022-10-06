@extends('app.main_master')

@section('title')
    User Dashboard | Starbuy
@endsection

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>My Account</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ (!empty($user->profile_photo_path)) ? url($user->profile_photo_path) : asset('frontend/assets/no-image.jpg') }}"
                class="card-img-top" style="border-radius: 50; margin-left: 30px; margin-bottom: 20px;"
                width="100" height="100" alt="">

                <ul class="list-group list-group-flush">
                    <a href="" class="btn btn-primary btn-small btn-block">Home</a>
                    <a href="{{ route('user.edit-profile') }}" class="btn btn-success btn-small btn-block">Edit Profile</a>
                    <a href="{{ route('change-password.user') }}" class="btn btn-info btn-small btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-small btn-block">Logout</a>
                </ul>

            </div>

            <div class="col-md-2">
            </div>


            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">Welcome to our Starbuy Store
                        <strong>{{ Auth::user()->name }}</strong>
                    </h3>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@extends('app.main_master')

@section('title')
    Sign In | Starbuy Store
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">

                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with
                                Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>

                        <form class="register-form outer-top-xs"
                        action="{{ isset($guard) ? url($guard . '/login') : route('login') }}"
                        method="POST" role="form">
                        @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" class="form-control unicase-form-control text-input"
                                name="email" value="{{ old('email') }}" />
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="password">
                            </div>

                            <div class="radio outer-xs">
                                <label for="remember_me">
                                    <input type="radio" name="remember" id="remember_me">Remember
                                    me!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>

                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    @include('auth.register')
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('app.body.partners')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

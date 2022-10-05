@extends('app.main_master')

@section('title')
    Forgot Password | Starbuy Store
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Forgot Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">

                    <!-- Reset password -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Reset your password</h4>


                        <form class="register-form outer-top-xs"
                        action="{{ route('password.email') }}"
                        method="POST" role="form">
                        @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" class="form-control unicase-form-control text-input"
                                name="email" value="{{ old('email') }}" />
                            </div>


                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
                        </form>

                    </div>

                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('app.body.partners')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

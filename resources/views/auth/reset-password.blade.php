@extends('app.main_master')

@section('title')
    Reset Password | Starbuy Store
@endsection

@section('content')

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">

                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Reset Your Password</h4>

                        <form class="register-form outer-top-xs"
                        action="{{ route('password.update') }}"
                        method="POST" role="form">
                        @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" class="form-control unicase-form-control text-input"
                                name="email" value="{{ old('email') }}" />
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="password">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input"
                                    id="password_confirmation">
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
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

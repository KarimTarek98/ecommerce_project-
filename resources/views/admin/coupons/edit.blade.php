@extends('admin.admin_master')

@section('title')
    Edit Coupon | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Coupons</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Extra</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Coupon</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('admin.update-coupon') }}" method="POST">
                                @csrf

                                <input type="hidden" name="coupon_id" value="{{ $coupon->id }}">
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Coupon Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $coupon->coupon_code }}" name="coupon_code" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('coupon_code')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Coupon Discount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $coupon->coupon_discount }}" name="coupon_discount" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('coupon_discount')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Coupon Validity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="coupon_validity"
                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                            class="form-control"
                                            value="{{ $coupon->coupon_validity }}">
                                            <div class="help-block"></div>
                                        </div>
                                        @error('coupon_validity')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Coupon" />
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>

        </div>

    </section>
@endsection

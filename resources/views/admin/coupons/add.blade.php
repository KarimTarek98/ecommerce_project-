@extends('admin.admin_master')

@section('title')
    Add New Coupon | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <x-forms.breadcrumb section="Coupons" page="Add New" />

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="box">
                <x-forms.form-header>
                    Add New Coupon
                </x-forms.form-header>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('admin.store-coupon') }}" method="POST">
                                @csrf

                                <x-forms.input-group head="Coupon Code" inputName="coupon_code" type="text"
                                    name="coupon_code" />

                                <x-forms.input-group head="Coupon Discount" inputName="coupon_discount" type="text"
                                    name="coupon_discount" />

                                <x-forms.input-group head="Coupon Validity" inputName="coupon_validity" type="date"
                                    name="coupon_validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" />

                                <x-forms.submit-button value="Store Coupon" />
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

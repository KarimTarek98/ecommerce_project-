@extends('admin.admin_master')

@section('title')
    All Coupons | Admin Dashboard
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Coupons</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Coupons</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coupons List</h3>
                        <a href="{{ route('admin.add-coupon') }}" class="btn btn-rounded btn-primary mb-5" style="float: right;">
                            Add New Coupon
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Coupon Code</th>
                                        <th>Coupon Discount %</th>
                                        <th>Coupon Validity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->coupon_code }}</td>
                                        <td>{{ $coupon->coupon_discount }} %</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($coupon->coupon_validity)->format('D, d F Y') }}
                                        </td>
                                        <td>
                                            @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-pill badge-success"> Valid </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> Invalid </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit-coupon', $coupon->id) }}" class="btn btn-success" title="Edit Partner">
                                                <i class="fa  fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('admin.delete-coupon', $coupon->id) }}" id="delete" class="btn btn-danger" title="Delete Partner">
                                                <i class="fa  fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('js')
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
@endsection

@extends('admin.admin_master')

@section('title')
Manage Products | Admin Dashboard
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image </th>
                                            <th>Product Name En</th>
                                            <th>Product Name Ar </th>
                                            <th>Quantity </th>
                                            <th>Discount </th>
                                            <th>Status </th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td> <img src="{{ asset($product->product_thumbnail) }}"
                                                        style="width: 60px; height: 50px;"> </td>
                                                <td>{{ $product->product_name_en }}</td>
                                                <td>{{ $product->product_name_ar }}</td>
                                                <td>{{ $product->product_qty }}</td>

                                                @if (isset($product->discount_price))
                                                @php
                                                $discount = ($product->selling_price - $product->discount_price) / $product->selling_price;
                                                $discountPercent = $discount * 100;
                                                @endphp
                                                <td>
                                                    <span class="badge badge-info">{{ round($discountPercent) }}%</span>
                                                </td>
                                                @else
                                                <td>
                                                    <span class="badge badge-danger">No Discount</span>
                                                </td>
                                                @endif


                                                @if ($product->status == 1)
                                                    <td>
                                                        <span class="badge badge-success">Active</span>
                                                    </td>
                                                @else
                                                <td>
                                                    <span class="badge badge-danger">Inactive</span>
                                                </td>
                                                @endif

                                                <td>
                                                    <a href="{{ route('admin.edit-product', $product->id) }}" class="btn btn-success"
                                                        title="Edit Product"><i class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('admin.product-delete', $product->id) }}"
                                                        class="btn btn-danger" title="Delete Product" id="delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    @if ($product->status == 1)
                                                    <a href="{{ route('deactivate.product', $product->id) }}"
                                                        class="btn btn-danger" title="Deactivate">
                                                        <i class="fa fa-arrow-down"></i>
                                                    </a>
                                                    @else
                                                    <a href="{{ route('activate.product', $product->id) }}"
                                                        class="btn btn-success" title="Activate">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </a>
                                                    @endif
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
        <!-- /.content -->
@endsection

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
                                                <td>
                                                    <a href="{{ route('admin.edit-product', $product->id) }}" class="btn btn-success"
                                                        title="Edit Product"><i class="fa fa-pencil"></i> </a>
                                                    <a href=""
                                                        class="btn btn-danger" title="Delete Product" id="delete">
                                                        <i class="fa fa-trash"></i></a>
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

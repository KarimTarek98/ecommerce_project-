@extends('admin.admin_master')

@section('title')
    Add New City | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Shipping</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Extra</li>
                            <li class="breadcrumb-item active" aria-current="page">Add New</li>
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
                    <h4 class="box-title">Add New City</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('admin.shipping.store-city') }}" method="POST">
                                @csrf
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>City Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="city_name" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('city_name')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add City" />
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

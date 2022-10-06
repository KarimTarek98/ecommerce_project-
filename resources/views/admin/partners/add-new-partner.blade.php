@extends('admin.admin_master')

@section('title')
    Add New Partners | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Partners</h3>
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
                    <h4 class="box-title">Add New Partners</h4>
                </div>
                @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ $error }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('admin.store-partner') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Partner Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="partner_name_en" class="form-control"
                                                required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Partner Name Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="partner_name_ar" class="form-control"
                                                required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Partner Image | Logo <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="partner_img" class="form-control"
                                                required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Store Partner" />
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

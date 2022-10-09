@extends('admin.admin_master')

@section('title')
    Edit Category | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Categories</h3>
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
                    <h4 class="box-title">Edit Category</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('admin.update-category') }}" method="POST">
                                @csrf

                                <input type="hidden" name="category_id" value="{{ $category->id }}">

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Category Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en"
                                            value="{{ $category->category_name_en }}" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('category_name_en')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Category Name Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_ar"
                                            value="{{ $category->category_name_ar }}" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('category_name_ar')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Category Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon"
                                            value="{{ $category->category_icon }}" class="form-control" >
                                            <div class="help-block"></div>
                                        </div>
                                        @error('category_icon')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Category" />
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

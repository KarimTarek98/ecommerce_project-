@extends('admin.admin_master')

@section('title')
    Edit Subcategory | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Subcategories</h3>
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
                    <h4 class="box-title">Edit Subcategory</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('sub_categories.update', $subcategory->subcategory_slug_en) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                {{-- <input type="hidden" name="subcategory_id" value="{{ $subcategory->id }}"> --}}

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Subcategory Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en"
                                            value="{{ $subcategory->subcategory_name_en }}" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('subcategory_name_en')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Subcategory Name Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_ar"
                                            value="{{ $subcategory->subcategory_name_ar }}" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('subcategory_name_ar')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="select" class="form-control" aria-invalid="false">
                                                {{-- <option selected disabled>Select Your City</option> --}}
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ ($subcategory->category_id == $category->id) ? 'selected' : '' }}>
                                                    {{ $category->category_name_en }}
                                                </option>
                                                @endforeach
                                            </select>
                                        <div class="help-block"></div></div>
                                        @error('category_icon')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Subcategory" />
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

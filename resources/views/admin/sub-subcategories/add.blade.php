@extends('admin.admin_master')

@section('title')
    Add New Sub-subcategory | Dashboard
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Sub-subcategories</h3>
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
                    <h4 class="box-title">Add New Sub-subcategory</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('sub-subcategory.store') }}" method="POST">
                                @csrf
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Sub-subcategory Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="sub_sub_category_name_en" class="form-control" />
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
                                        <h5>Sub-subcategory Name Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="sub_sub_category_name_ar" class="form-control" />
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
                                                <option selected disabled>Select Your Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
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

                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <h5>Sub Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="select" class="form-control" aria-invalid="false">
                                                <option selected disabled>Select Your Sub Category</option>

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
                                    <input type="submit" class="btn btn-rounded btn-info" value="Store Subcategory" />
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

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('select[name="category_id"]').on('change', function () {
            var category_id = $(this).val();

            if (category_id)
            {
                $.ajax({
                    url: "{{  url('/admin/sub-sub/get') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d =$('select[name="subcategory_id"]').empty();

                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.subcategory_name_en +'</option>');
                        });
                    },
                });
            }
            else
            {
                alert('danger');
            }
        });
    });
</script>
@endsection



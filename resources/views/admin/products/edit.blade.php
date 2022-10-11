@extends('admin.admin_master')

@section('title')
    Edit Product | Admin Dashboard
@endsection

@section('content')
    <style>
        .bootstrap-tagsinput .label-info {
            background-color: #1d32cf !important;
        }
    </style>
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Product </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="">
                            @csrf
                            <div class="row">
                                <div class="col-12">


                                    <div class="row">
                                        <!-- start 1st row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="partner_id" class="form-control">
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}"
                                                                {{ $brand->id == $product->partner_id ? 'selected' : '' }}>
                                                                {{ $brand->partner_name_en }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                                {{ $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->


                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control">
                                                        @foreach ($subCategories as $subCategory)
                                                            <option value="{{ $subCategory->id }}"
                                                                {{ $subCategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                                                {{ $subCategory->subcategory_name_en }}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 1st row  -->


                                </div>
                            </div>

                            <div class="row">
                                <!-- start 2nd row  -->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subsubcategory_id" class="form-control">
                                                @foreach ($subSubCategories as $subSubCategory)
                                                    <option value="{{ $subSubCategory->id }}"
                                                        {{ $subSubCategory->id == $product->subsubcategory_id ? 'selected' : '' }}>
                                                        {{ $subSubCategory->sub_sub_category_name_en }}</option>
                                                @endforeach

                                            </select>
                                            @error('subsubcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Name En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_en" value="{{ $product->product_name_en }}" class="form-control">
                                            @error('product_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Name Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_ar" value="{{ $product->product_name_ar }}" class="form-control">
                                            @error('product_name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- start 3RD row  -->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code" value="{{ $product->product_code }}" class="form-control">
                                            @error('product_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Quantity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" value="{{ $product->product_qty }}" class="form-control">
                                            @error('product_qty')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->


                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Tags En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" value="{{ $product->product_tags_en }}" class="form-control"
                                                data-role="tagsinput">
                                            @error('product_tags_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                            </div> <!-- end 3RD row  -->


                            {{-- 4th Row --}}
                            <div class="row">

                                <div class="col-md-4">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Tags Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_ar" value="{{ $product->product_tags_ar }}" class="form-control"
                                                data-role="tagsinput">
                                            @error('product_tags_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-4">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Size En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_en" value="{{ $product->product_tags_ar }}" class="form-control"
                                                data-role="tagsinput">
                                            @error('product_size_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-4">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Size Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_ar" class="form-control"
                                                value="{{ $product->product_size_ar }}" data-role="tagsinput">
                                            @error('product_size_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col -->

                            </div>
                            <!--end 4th row-->

                            {{-- 5th Row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Color En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" class="form-control"
                                                value="{{ $product->product_color_en }}" data-role="tagsinput">
                                            @error('product_color_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-4">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_ar" class="form-control"
                                                value="{{ $product->product_color_ar }}" data-role="tagsinput">
                                            @error('product_color_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                            @error('selling_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!--end 5th row-->

                            {{-- 6th Row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount_price" value="{{ $product->discount_price }}" class="form-control">
                                            @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->


                            </div>
                            <!--end 6th row-->

                            {{-- 7th Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Overview En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_overview_en" id="textarea" class="form-control">
                                                {{ $product->product_overview_en }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Overview Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_overview_ar" id="textarea" class="form-control">
                                                {{ $product->product_overview_ar }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!--end 7th row-->

                            {{-- 8th Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="product_description_en" rows="10" cols="80">
                                                {!! $product->product_description_en !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Description Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="product_description_ar" rows="10" cols="80">
                                                {!! $product->product_description_ar !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!--end 8th row-->

                            {{-- 9th Row --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                {{ ($product->hot_deals == 1) ? 'checked' : '' }} value="1">
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured"
                                                {{ ($product->featured == 1) ? 'checked' : '' }} value="1">
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <!-- start col -->
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer"
                                                {{ ($product->special_offer == 1) ? 'checked' : '' }} value="1">
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals"
                                                {{ ($product->special_deals == 1) ? 'checked' : '' }} value="1">
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!--end 9th row-->

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

@section('js')
    <!-- /// Tags Input Script -->
    <script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>

    <!-- // CK EDITOR  -->
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
    <script src="{{ asset('backend/js/pages/editor.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();

                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/products/get') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();

                if (subcategory_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/admin/products/getsubsub') }}/" + subcategory_id,
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sub_sub_category_name_en + '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>

    <script>
        function mainThumb(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#product_thumb').attr('src', e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#multiImgs').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#previewImgs').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection

@extends('admin.admin_master')

@section('title')
    Add Product | Admin Dashboard
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
                <h4 class="box-title">Add Product </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form novalidate>
                            <div class="row">
                                <div class="col-12">


                                    <div class="row">
                                        <!-- start 1st row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Brand
                                                        </option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">
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
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
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
                                                        <option value="" selected="" disabled="">Select
                                                            SubCategory</option>

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
                                                <option value="" selected="" disabled="">Select SubSubCategory
                                                </option>

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
                                            <input type="text" name="product_name_en" class="form-control">
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
                                            <input type="text" name="product_name_ar" class="form-control">
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
                                            <input type="text" name="product_code" class="form-control">
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
                                            <input type="text" name="product_qty" class="form-control">
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
                                            <input type="text" name="product_tags_en" class="form-control"
                                                value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                            @error('product_tags_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                            </div> <!-- end 3RD row  -->


                            {{-- 4th Row --}}
                            <div class="row">

                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Tags Hin <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_hin" class="form-control"
                                                value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                            @error('product_tags_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Size En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_en" class="form-control"
                                                value="Small,Midium,Large" data-role="tagsinput">
                                            @error('product_size_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Size Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_ar" class="form-control"
                                                value="Small,Midium,Large" data-role="tagsinput">
                                            @error('product_size_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!-- end col -->

                            </div><!--end 4th row-->

                            {{-- 5th Row --}}
                            <div class="row">
                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Color En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" class="form-control"
                                                value="red,Black,Amet" data-role="tagsinput">
                                            @error('product_color_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_ar" class="form-control"
                                                value="red,Black,Large" data-role="tagsinput">
                                            @error('product_color_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" class="form-control">
                                            @error('selling_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div><!--end 5th row-->

                            {{-- 6th Row --}}
                            <div class="row">
                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount_price" class="form-control">
                                            @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="product_thumbnail" class="form-control">
                                            @error('product_thumbnail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-4"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Multiple Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="multi_img[]" class="form-control">
                                            @error('multi_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div><!--end 6th row-->

                            {{-- 7th Row --}}
                            <div class="row">
                                <div class="col-md-6"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Overview En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_overview_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Overview Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="product_overview_ar" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div><!--end 7th row-->

                            {{-- 8th Row --}}
                            <div class="row">
                                <div class="col-md-6"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="product_description_en" rows="10" cols="80">
                                    Product Description English
                                                    </textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6"> <!-- start col -->
                                    <div class="form-group">
                                        <h5>Product Description Ar <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="product_description_ar" rows="10" cols="80">
                                                Product Description Ar
                                                                </textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!--end 8th row-->

                            {{-- 9th Row --}}
                            <div class="row">
                                <div class="col-md-6"> <!-- start col -->
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6"> <!-- start col -->
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div><!--end 9th row-->

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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
@endsection

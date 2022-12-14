@extends('app.main_master')
@section('title')
    {{ $product->product_name_en }}
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">{{ $product->category->category_name_en }}</a></li>
                    <li class="active">{{ $product->product_name_en }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row single-product">
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div>



                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('app.common-sections.hot-deals')
                        <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs animated"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <h3 class="section-title">Newsletters</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <p>Sign Up for Our Newsletter!</p>
                                <form>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Subscribe to our newsletter">
                                    </div>
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs  animated"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <div id="advertisement" class="advertisement owl-carousel owl-theme"
                                style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" style="width: 1338px; left: 0px; display: block;">
                                        <div class="owl-item" style="width: 223px;">
                                            <div class="item">
                                                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png') }}"
                                                        alt="Image"></div>
                                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem
                                                    lacus port mollis. Nunc condime tum metus eud molest sed
                                                    consectetuer.<em>"</em></div>
                                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                                <!-- /.container-fluid -->
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 223px;">
                                            <div class="item">
                                                <div class="avatar"><img src="assets/images/testimonials/member3.png"
                                                        alt="Image"></div>
                                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem
                                                    lacus port mollis. Nunc condime tum metus eud molest sed
                                                    consectetuer.<em>"</em></div>
                                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 223px;">
                                            <div class="item">
                                                <div class="avatar"><img src="assets/images/testimonials/member2.png"
                                                        alt="Image"></div>
                                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem
                                                    lacus port mollis. Nunc condime tum metus eud molest sed
                                                    consectetuer.<em>"</em></div>
                                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span>
                                                </div><!-- /.container-fluid -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.item -->

                                <!-- /.item -->

                                <!-- /.item -->

                                <div class="owl-controls clickable">
                                    <div class="owl-pagination">
                                        <div class="owl-page active"><span class=""></span></div>
                                        <div class="owl-page"><span class=""></span></div>
                                        <div class="owl-page"><span class=""></span></div>
                                    </div>
                                    <div class="owl-buttons">
                                        <div class="owl-prev"></div>
                                        <div class="owl-next"></div>
                                    </div>
                                </div>
                            </div><!-- /.owl-carousel -->
                        </div>

                        <!-- ============================================== Testimonials: END ============================================== -->



                    </div>
                </div><!-- /.sidebar -->
                <div class="col-md-9">
                    <div class="detail-block">
                        <div class="row  wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">

                                        @foreach ($productImgs as $img)
                                            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                <a data-lightbox="image-1" data-title="Gallery"
                                                    href="{{ asset($img->img_name) }} ">
                                                    <img class="img-responsive" alt=""
                                                        src="{{ asset($img->img_name) }} "
                                                        data-echo="{{ asset($img->img_name) }} " />
                                                </a>
                                            </div><!-- /.single-product-gallery-item -->
                                        @endforeach

                                    </div><!-- /.single-product-slider -->

                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">

                                            @foreach ($productImgs as $img)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                        data-slide="1" href="#slide{{ $img->id }}">
                                                        <img class="img-responsive" width="85" alt=""
                                                            src="{{ asset($img->img_name) }} "
                                                            data-echo="{{ asset($img->img_name) }} " />
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div><!-- /#owl-single-product-thumbnails -->
                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class="col-sm-6 col-md-7 product-info-block">
                                <div class="product-info">
                                    <h1 class="name" id="product_name">
                                        {{ session()->get('lang') == 'ar' ? $product->product_name_ar : $product->product_name_en }}
                                    </h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small rateit"><button id="rateit-reset-5"
                                                        data-role="none" class="rateit-reset" aria-label="reset rating"
                                                        aria-controls="rateit-range-5" style="display: none;"></button>
                                                    <div id="rateit-range-5" class="rateit-range" tabindex="0"
                                                        role="slider" aria-label="rating" aria-owns="rateit-reset-5"
                                                        aria-valuemin="0" aria-valuemax="5" aria-valuenow="4"
                                                        aria-readonly="true" style="width: 70px; height: 14px;">
                                                        <div class="rateit-selected" style="height: 14px; width: 56px;">
                                                        </div>
                                                        <div class="rateit-hover" style="height:14px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        {{ session()->get('lang') == 'ar' ? $product->product_overview_ar : $product->product_overview_en }}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if ($product->discount_price != null)
                                                        <span class="price">EGP{{ $product->discount_price }}</span>
                                                        <span class="price-strike">{{ $product->selling_price }}</span>
                                                    @else
                                                        <span class="price">EGP{{ $product->selling_price }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="right" title="" href="#"
                                                        data-original-title="Wishlist">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="right" title="" href="#"
                                                        data-original-title="Add to Compare">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="right" title="" href="#"
                                                        data-original-title="E-mail">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="row" style="margin-top: 30px">
                                        @if (!empty($productColors))
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="info-title control-label">Color <span>*</span></label>
                                                <select id="color" class="form-control unicase-form-control selectpicker">
                                                    <option selected disabled>--Select options--</option>
                                                    @foreach ($productColors as $color)
                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if (!empty($productSizes))
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="info-title control-label">Size <span>*</span></label>
                                                <select id="size" class="form-control unicase-form-control selectpicker">
                                                    <option selected disabled>--Select options--</option>
                                                    @foreach ($productSizes as $size)
                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">

                                                        <input type="number" class="form-control" id="quantity" value="1" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="product_id" value="{{ $product->id }}">
                                            <div class="col-sm-7">
                                                <button type="submit" onclick="addToCart()" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if (session()->get('lang') == 'ar')
                                                    {!! $product->product_description_ar !!}
                                                @else
                                                    {!! $product->product_description_en !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this
                                                                product</span><span class="date"><i
                                                                    class="fa fa-calendar"></i><span>1 days
                                                                    ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit.Aliquam suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Quality</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Price</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="cell-label">Value</td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="1"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="2"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="3"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="4"></td>
                                                                    <td><input type="radio" name="quality"
                                                                            class="radio" value="5"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span
                                                                                class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt"
                                                                            id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span
                                                                                class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT
                                                                    REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag"
                                                            class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD
                                                        TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                        single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Realted Products</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                            @foreach ($relatedProducts as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{ url('product-details/' . $product->id . '/' . $product->product_slug_en) }}"><img
                                                        src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                            </div>
                                            <!-- /.image -->
                                            @php
                                                $discount = ($product->selling_price - $product->discount_price) / $product->selling_price;
                                                $discountPercent = $discount * 100;
                                            @endphp
                                            @if ($product->discount_price != null)
                                            <div class="tag hot"><span>{{ round($discountPercent) }}%</span></div>
                                            @else
                                            <div class="tag new">New</div>
                                            @endif

                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <a href="{{ url('product-details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    {{ (session()->get('lang') == 'ar') ? $product->product_name_ar : $product->product_name_en }}
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price">
                                                @if ($product->discount_price != null)
                                                <span class="price"> EGP{{ $product->discount_price }} </span>
                                                <span class="price-before-discount"> {{ $product->selling_price }}</span>
                                                @else
                                                <span class="price"> EGP{{ $product->selling_price }} </span>
                                                @endif
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add
                                                            to cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            @endforeach
                            <!-- /.item -->

                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->

























            <!-- ==== ================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp animated"
                style="visibility: visible; animation-name: fadeInUp;">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme"
                        style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper" style="width: 3800px; left: 0px; display: block;">
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item m-t-15">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand1.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item m-t-10">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand2.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand3.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand4.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand5.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand6.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand2.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img src="assets/images/brands/brand4.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 190px;">
                                    <div class="item">
                                        <a href="#" class="image">
                                            <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->

                        <!--/.item-->
                        <div class="owl-controls clickable">
                            <div class="owl-buttons">
                                <div class="owl-prev"></div>
                                <div class="owl-next"></div>
                            </div>
                        </div>
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- == = BRANDS CAROUSEL : END = -->
        </div><!-- /.container -->
    </div>
@endsection

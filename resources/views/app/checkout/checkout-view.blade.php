@extends('app.main_master')
@section('title')
    My Checkout
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->




    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->

                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>


                                                <!-- radio-form  -->
                                            <form method="POST" action="{{ route('checkout.save') }}" class="register-form" role="form">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="info-title" for="shipping_name">Shipping Name
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="shipping_name"  name="shipping_name" placeholder="write your name"
                                                            value="{{ Auth::user()->name }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="shipping_email">Shipping Email
                                                            <span>*</span></label>
                                                        <input type="email"
                                                            class="form-control unicase-form-control text-input"
                                                            id="shipping_email" name="shipping_email" placeholder="Write your email"
                                                            value="{{ Auth::user()->email }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="shipping_phone">Shipping Phone
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="shipping_phone" name="shipping_phone" placeholder="Write your phone"
                                                            value="{{ Auth::user()->phone }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="post_code">Post Code
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="post_code" name="post_code" placeholder="Write your post code"
                                                            required>
                                                    </div>


                                                <!-- radio-form  -->


                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">

                                                    <div class="form-group">
                                                        <h5>City Select <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="city_id" class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    City
                                                                </option>
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id }}">
                                                                        {{ $city->city_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('city_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Region Select <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="region_id" class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    Region
                                                                </option>

                                                            </select>
                                                            @error('region_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>Select District <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="district_id" class="form-control">
                                                                <option value="" selected="" disabled="">Select
                                                                    District
                                                                </option>

                                                            </select>
                                                            <div class="help-block"></div>
                                                            @error('district_id')
                                                                <span class="text-danger">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="notes" class="info-title">Notes </label>
                                                        <textarea name="notes" id="notes" cols="30" rows="5" class="form-control"></textarea>
                                                    </div>
                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- End checkout-step-01  -->




                        </div><!-- /.checkout-steps -->
                    </div>




                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">

                                            @foreach ($cart as $item)
                                                <li>
                                                    <strong>Image: </strong>
                                                    <img src="{{ asset($item->options->image) }}"
                                                        style="height: 50px; width: 50px;">
                                                </li>

                                                <li>
                                                    <strong>Qty: </strong>
                                                    ({{ $item->qty }})
                                                    @if ($item->options->color != '')
                                                        <strong>Color: </strong>
                                                        {{ $item->options->color }}
                                                    @endif


                                                    @if ($item->options->size != '')
                                                        <strong>Size: </strong>
                                                        {{ $item->options->size }}
                                                    @endif

                                                </li>
                                            @endforeach
                                            <hr>
                                            <li>
                                                @if (Session::has('coupon'))
                                                    <strong>SubTotal: </strong> ${{ $cartTotal }}
                                                    <hr>

                                                    <strong>Coupon Code : </strong>
                                                    {{ session()->get('coupon')['coupon_code'] }}
                                                    ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                    <hr>

                                                    <strong>Coupon Discount : </strong>
                                                    ${{ session()->get('coupon')['discount_amount'] }}
                                                    <hr>

                                                    <strong>Grand Total : </strong>
                                                    ${{ session()->get('coupon')['total'] }}
                                                    <hr>
                                                @else
                                                    <strong>SubTotal: </strong> ${{ $cartTotal }}
                                                    <hr>

                                                    <strong>Grand Total : </strong> ${{ $cartTotal }}
                                                    <hr>
                                                @endif

                                            </li>



                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>

                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="radio" id="stripe" name="payment_method" value="stripe">
                                            <label for="stripe">Stripe</label>
                                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-3">
                                            <input type="radio" id="card" name="payment_method" value="card">
                                            <label for="card">Card</label>

                                            <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-6">
                                            <input type="radio" id="cod" name="payment_method" value="cod">
                                            <label for="cod">Cash On Delivey</label>

                                            <img src="{{ asset('frontend/assets/images/payments/2.png') }}">
                                        </div> <!-- end col md 4 -->


                                    </div> <!-- // end row  -->
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Proceed To Payment</button>


                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- === ===== BRANDS CAROUSEL ==== ======== -->








            <!-- ===== == BRANDS CAROUSEL : END === === -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(function() {
            $('select[name="city_id"]').on('change', function() {
                var cityId = $(this).val();
                //$('select[name="district_id"]').empty();

                if (cityId) {
                    $.ajax({
                        type: "GET",
                        url: "/checkout/shipping/get-regions/" + cityId,
                        dataType: "json",
                        success: function(response) {
                            $('select[name="region_id"]').empty();
                            $.each(response, function(key, value) {
                                $('select[name="region_id"]').append('<option value="' +
                                    value.id + '">' + value.region_name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="region_id"]').on('change', function() {
                var regionId = $(this).val();

                if (regionId) {
                    $.ajax({
                        type: "GET",
                        url: "/checkout/shipping/get-districts/" + regionId,
                        dataType: "json",
                        success: function(response) {
                            $('select[name="district_id"]').empty();

                            $.each(response, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' +
                                    value.id + '">' + value.district_name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection

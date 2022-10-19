@extends('app.main_master')

@section('title')
    My Cart | Starbuy Store
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">My Cart</a></li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
					<th class="cart-romove item">Image</th>
					<th class="cart-description item">Product Name</th>
					<th class="cart-edit item">Quantity</th>
					<th class="cart-qty item">Size</th>
					<th class="cart-sub-total item">Total</th>
					<th class="cart-total last-item">Color</th>
					<th class="cart-total last-item">Remove</th>
				</tr>
                                </thead>
                                <tbody id="my_cart">



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3 col-sm-12 estimate-ship-tax">
                        </div>

                        <div class="col-md-5 col-sm-12 estimate-ship-tax">

                            @if (session()->has('coupon'))

                            @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">Discount Code</span>
                                            <p>Enter your coupon code if you have one..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" id="coupon_code" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                                                </div>
                                                <div class="clearfix pull-right">
                                                    <button type="submit" class="btn-upper btn btn-primary" onclick="couponApply()">
                                                        APPLY COUPON
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                            @endif

                        </div>

                        @if (session()->has('coupon'))
                        <div class="col-md-6 col-sm-12 cart-shopping-total">
                            <table class="table">
                                <thead id="calc_discount">

                                </thead><!-- /thead -->
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="cart-checkout-btn pull-right">
                                                    <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                                    <span class="">Checkout with multiples address!</span>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                        @else
                        <div class="col-md-4 col-sm-12 cart-shopping-total">
                            <table class="table">
                                <thead id="calc_discount">

                                </thead><!-- /thead -->
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="cart-checkout-btn pull-right">
                                                    <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                                                    <span class="">Checkout with multiples address!</span>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                        @endif



                    </div>
                </div><!-- /.row -->



            </div><!-- /.sigin-in-->
            <br><br>
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

@section('js')
<script type="text/javascript">
    function couponApply()
    {
        var couponCode = $('#coupon_code').val();

        $.ajax({
            type: "POST",
            url: "{{ url('/coupon-apply') }}",
            data: {
                coupon_code: couponCode
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (data) {

                const MSG = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                    })

                    if ($.isEmptyObject(data.error))
                    {
                        MSG.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    }
                    else
                    {
                        MSG.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }

            }
        });
    }

    function calcDiscount() {
        $.ajax({
            type: "GET",
            url: "{{ url('/calc-discount') }}",
            dataType: "json",
            success: function (data) {
                //console.log(data);
                if (data.total)
                {
                    $('#calc_discount').html(`
                    <tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md">EGP ${data.total}</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md">EGP ${data.total}</span>
                            </div>
                        </th>
                    </tr>
                    `);
                }
                else
                {
                    $('#calc_discount').html(`
                    <tr>
                        <th>
                            <div class="cart-sub-total">
                                Coupon Code<span class="inner-left-md">${data.coupon_code}</span>
                            </div>
                            <div class="cart-sub-total">
                                Coupon Discount<span class="inner-left-md">${data.coupon_discount}%</span>
                            </div>
                            <div class="cart-sub-total">
                                Discount Amount<span class="inner-left-md">EGP ${data.discount_amount}</span>
                            </div>
                            <div class="cart-sub-total">
                                Total Before Discount<span class="inner-left-md">EGP ${data.total_before_discount}</span>
                            </div>
                            <div class="cart-grand-total">
                                Total After Discount<span class="inner-left-md">EGP ${data.total_after_discount}</span>
                            </div>
                        </th>
                    </tr>
                    `);
                }
            }
        });
    }
    calcDiscount();
</script>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->

    {{-- if we have rtl styles we do that

    @if (session()->get('lang') == 'en')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ltr.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}">
    @endif --}}

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <style>
        .toast-success {
            background-color: #00BC8B !important;
            font-size: 15px !important;
        }

        .toast-error {
            background-color: #EF3737 !important;
            font-size: 15px !important;
        }

        .toast-info {
            background-color: #7a15f7 !important;
            font-size: 15px !important;
        }

        .toast-warning {
            background-color: #FFB800 !important;
            font-size: 15px !important;
        }
    </style>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('app.body.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('app.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            @if (session()->has('error'))
                toastr.error('{{ session()->get('error') }}');
            @elseif (session()->has('success'))
                toastr.success('{{ session()->get('success') }}');
            @elseif (session()->has('info'))
                toastr.info('{{ session()->get('info') }}');
            @elseif (session()->has('warning'))
                toastr.warning('{{ session()->get('warning') }}');
            @endif
        });
    </script>

    <!-- Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong id="product_name"></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card" style="width: 18rem; margin: 0 auto;">
                                <img src="" id="product_img" class="card-img-top" alt="..."
                                    style="height: 200px; width: 180px;">
                            </div>

                        </div><!-- // end col md -->

                        <div class="col-md-4">

                            <ul class="list-group">
                                <li class="list-group-item">
                                    Product Price: <span id="product_price">
                                        <span id="new_price" class="text-danger"></span>
                                        <del id="old_price"></del>
                                    </span>
                                </li>
                                <li class="list-group-item">Product Code: <span id="product_code"></span></li>
                                <li class="list-group-item">Category: <span id="product_category"></span></li>
                                <li class="list-group-item">Brand: <span id="product_brand"></span></li>
                                <li class="list-group-item">Stock
                                    <span class="badge badge-pill badge-success" id="available" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="not_available" style="background: red; color: white;"></span>
                                </li>
                            </ul>

                        </div><!-- // end col md -->

                        <div class="col-md-4">

                            <div class="form-group" id="product_color">
                                <label for="exampleFormControlSelect1">Choose Color</label>
                                <select class="form-control" name="product_colors" id="exampleFormControlSelect1">


                                </select>
                            </div>

                            <div class="form-group" id="product_size">
                                <label for="exampleFormControlSelect1">Choose Size</label>
                                <select class="form-control" name="product_size" id="exampleFormControlSelect1">


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quantity</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" value="1"
                                    min="1">
                            </div> <!-- // end form group -->

                            <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>

                        </div><!-- // end col md -->

                    </div> <!-- // end row -->

                </div> <!-- // end modal Body -->

            </div>
        </div>
    </div>
    <!-- End Add to Cart Product Modal -->

    <script type="text/javascript">
        $.ajaxSetup({
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        });

        function getProduct(id)
        {
            $.ajax({
                'type': 'GET',
                'url': '/product/cart/modal/' + id,
                dataType: 'json',
                success: function (data) {
                    $('#product_img').attr('src', '/' + data.product.product_thumbnail);
                    //$('#product_price').text(data.product.selling_price);
                    $('#product_code').text(data.product.product_code);
                    $('#product_category').text(data.product.category.category_name_en);
                    $('#product_brand').text(data.product.partner.partner_name_en);
                    $('#product_name').text(data.product.product_name_en);

                    // color
                    $('select[name="product_colors"]').empty();
                    $.each(data.colors, function (key, value) {
                            $('select[name="product_colors"]').append('<option value="' + value + '">' + value + '</option>');
                        });
                    if (data.colors != '')
                    {
                        $('#product_color').show();
                    }
                    else
                    {
                        $('#product_color').hide();
                    }

                    // size
                    $('select[name="product_size"]').empty();
                    $.each(data.sizes, function (key, value) {
                        $('select[name="product_size"]').append('<option value="' + value + '">' + value + '</option>');
                    });
                    if (data.sizes != '')
                    {
                        $('#product_size').show();
                    }
                    else
                    {
                        $('#product_size').hide();
                    }

                    // Price
                    if (data.product.discount_price != null)
                    {
                        $('#new_price').text(data.product.discount_price);
                        $('#old_price').text(data.product.selling_price);
                    }
                    else
                    {

                        $('#new_price').text(data.product.selling_price);
                        $('#old_price').text('');
                    }

                    // Stock Availability
                    if (data.product.product_qty > 0)
                    {
                        $('#available').text('Available');
                        $('#not_available').text('');
                    }
                    else
                    {
                        $('#available').text('');
                        $('#not_available').text('Not Available');
                    }


                }
            });
        }
    </script>
</body>

</html>

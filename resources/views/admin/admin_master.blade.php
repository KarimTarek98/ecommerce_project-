<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>@yield('title')</title>

    <!-- Vendors Style-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
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
    @yield('css')

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('admin.body.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.body.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">

                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        @include('admin.body.footer')



        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
    @yield('js')

</body>

</html>

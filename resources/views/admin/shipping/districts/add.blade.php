@extends('admin.admin_master')

@section('title')
    Add New District | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Shipping</h3>
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
                    <h4 class="box-title">Add New District</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('admin.shipping.store-district') }}" method="POST">
                                @csrf
                                <div class="row" style="margin-bottom: 30px">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>City Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="city_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select City
                                                    </option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('city_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Region Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="region_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Region
                                                    </option>

                                                </select>
                                                @error('region_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <h5>District Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="district_name" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('district_name')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add District" />
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function () {
        $('select[name="city_id"]').on('change', function () {
            var cityId = $(this).val();

            if (cityId)
            {
                $.ajax({
                    type: "GET",
                    url: "/admin/shipping/get-regions/" + cityId,
                    dataType: "json",
                    success: function (response) {
                        $('select[name="region_id"]').empty();
                        $.each(response, function (key, value) {
                            $('select[name="region_id"]').append('<option value="' + value.id + '">' + value.region_name + '</option>');
                        });
                    }
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

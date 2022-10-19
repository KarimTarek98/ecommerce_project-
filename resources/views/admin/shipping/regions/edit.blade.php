@extends('admin.admin_master')

@section('title')
    Edit Region | Dashboard
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
                    <h4 class="box-title">Edit Region</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ route('admin.shipping.update-region') }}" method="POST">
                                @csrf

                                <input type="hidden" name="region_id" value="{{ $region->id }}">
                                <div class="row" style="margin-bottom: 30px">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>City Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="city_id" class="form-control">
                                                    <option value="{{ $region->city_id }}" selected="" disabled="">
                                                        {{ $region->city->city_name }}
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


                                    <div class="col-md-6">
                                        <h5>Region Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $region->region_name }}" name="region_name" class="form-control" />
                                            <div class="help-block"></div>
                                            @error('region_name')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Region" />
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

@extends('admin.admin_master')

@section('title')
    All City Regions | Admin Dashboard
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All City Regions</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Regions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Regions List</h3>
                        <a href="{{ route('admin.add-city-region') }}" class="btn btn-rounded btn-primary mb-5" style="float: right;">
                            Add New Region
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>City Name</th>
                                        <th>Region Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($regions as $region)
                                    <tr>
                                        <td>{{ $region->city->city_name }}</td>
                                        <td>{{ $region->region_name }}</td>
                                        <td>
                                            <a href="{{ route('admin.shipping.edit-region', $region->id) }}" class="btn btn-success" title="Edit Region">
                                                <i class="fa  fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('admin.shipping.delete-region', $region->id) }}" id="delete" class="btn btn-danger" title="Delete Region">
                                                <i class="fa  fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('js')
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
@endsection

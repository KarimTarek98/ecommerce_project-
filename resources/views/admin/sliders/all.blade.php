@extends('admin.admin_master')

@section('title')
    All Sliders | Admin Dashboard
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Sliders</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Sliders</li>
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
                        <h3 class="box-title">Sliders List</h3>
                        <a href="{{ route('admin.add-slider') }}" class="btn btn-rounded btn-primary mb-5" style="float: right;">
                            Add New Partner
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Background</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($slider->background) }}"
                                            width="250"
                                            height="100"
                                            alt="">
                                        </td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>

                                        @if ($slider->status == 1)
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        @else
                                        <td>
                                            <span class="badge badge-danger">InActive</span>
                                        </td>
                                        @endif

                                        <td>
                                            <a href="{{ route('admin.edit-slider', $slider->id) }}" class="btn btn-success" title="Edit Slider">
                                                <i class="fa  fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('admin.delete-slider', $slider->id) }}" id="delete" class="btn btn-danger" title="Delete Slider">
                                                <i class="fa  fa-trash"></i>
                                            </a>

                                            @if ($slider->status == 1)
                                            <a href="{{ route('deactivate.slider', $slider->id) }}" class="btn btn-danger" title="Deactivate">
                                                <i class="fa  fa-arrow-down"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('activate.slider', $slider->id) }}" class="btn btn-success" title="Activate">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                            @endif
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

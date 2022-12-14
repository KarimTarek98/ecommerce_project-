@extends('admin.admin_master')

@section('title')
    All Partners | Admin Dashboard
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Partners</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Partners</li>
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
                        <h3 class="box-title">Partners List</h3>
                        <a href="{{ url('admin/partners/create') }}" class="btn btn-rounded btn-primary mb-5" style="float: right;">
                            Add New Partner
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Partner Name En</th>
                                        <th>Partner Name Ar</th>
                                        <th>Partner Logo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->partner_name_en }}</td>
                                        <td>{{ $partner->partner_name_ar }}</td>
                                        <td>
                                            <img src="{{ asset($partner->partner_img) }}"
                                            width="100"
                                            height="100"
                                            alt="">
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/partners/' . $partner->partner_slug_en . '/edit') }}" class="btn btn-success" title="Edit Partner">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            {{-- <form id="delete" method="POST" action="{{ route('partners.destroy', $partner->partner_slug_en) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-danger" value="Delete">

                                                </div>

                                            </form> --}}
                                            <a href="{{ url('admin/partners/' . $partner->partner_slug_en) }}" id="delete" class="btn btn-danger" title="Delete Partner">
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

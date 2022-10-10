@extends('admin.admin_master')

@section('title')
    Sub-Subcategories | Admin Dashboard
@endsection

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">All Sub-subcategories</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Sub-subcategories</li>
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
                        <h3 class="box-title">Sub-subcategories List</h3>
                        <a href="{{ route('admin.add-subsubcategory') }}" class="btn btn-rounded btn-primary mb-5" style="float: right;">
                            Add New Sub-subcategory
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Subcategory Name En</th>
                                        <th>Subcategory Name Ar</th>
                                        <th>Category</th>
                                        <th>Sub-Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subsubcategories as $subsubcategory)
                                    <tr>
                                        <td>{{ $subsubcategory->sub_sub_category_name_en }}</td>
                                        <td>{{ $subsubcategory->sub_sub_category_name_ar }}</td>
                                        <td>{{ $subsubcategory->category->category_name_en }}</td>
                                        <td>{{ $subsubcategory->subcategory->subcategory_name_en }}</td>
                                        <td>
                                            <a href="{{ route('sub-subcategory.edit', $subsubcategory->id) }}"
                                                class="btn btn-success" title="Edit Partner">
                                                <i class="fa  fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('sub-subcategory.delete', $subsubcategory->id) }}"
                                                id="delete" class="btn btn-danger" title="Delete Partner">
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

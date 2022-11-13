@extends('admin.admin_master')

@section('title')
    Add New Partners | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <x-forms.breadcrumb section="Partners" page="Add New" />

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="box">
                <x-forms.form-header>
                    Add New Partners
                </x-forms.form-header>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">



                        <div class="col">
                            <form action="{{ url('admin/partners') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                <x-forms.input-group head="Partner Name En"
                                inputName="partner_name_en" type="text" name="partner_name_en" />

                                <x-forms.input-group head="Partner Name Ar"
                                inputName="partner_name_ar" type="text" name="partner_name_ar" />

                                <x-forms.input-group head="Partner Image | Logo"
                                inputName="partner_img" type="file" name="partner_img" />


                                <x-forms.submit-button value="Store Partner" />

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

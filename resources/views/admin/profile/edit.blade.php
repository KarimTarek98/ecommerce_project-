@extends('admin.admin_master')

@section('title')
    Edit Profile | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Profile</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Extra</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                    <h4 class="box-title">Profile Information</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('admin.update-profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <input type="hidden" name="admin_id" value="{{ $admin->id }}">

                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required=""
                                                    data-validation-required-message="This field is required">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required=""
                                                    data-validation-required-message="This field is required">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>


                                        <div class="row" style="margin-bottom: 20px">
                                            <div class="col-md-6">
                                                <h5>Change Profile Picture <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="profile_photo_path" class="form-control" id="profile_photo">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <img src="{{ (!empty($admin->profile_photo_path))
                                                ? url($admin->profile_photo_path) : asset('backend/no-image.jpg') }}" width="100" height="100" alt="" id="show_img">
                                            </div>
                                        </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Profile" />
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
<script>
    $(function () {
        $('#profile_photo').change(function (e) {
            var readPic = new FileReader();
            readPic.onload = function (e) {
                $('#show_img').attr('src', e.target.result);
            }
            readPic.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection

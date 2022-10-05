@extends('admin.admin_master')

@section('title')
    Admin Profile | Dashboard
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Extra</li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="box box-inverse bg-img" style="background-image: url(../images/gallery/full/1.jpg);" data-overlay="2">
        <div class="flexbox px-20 pt-20">
          <label class="toggler toggler-danger text-white">
            <input type="checkbox">
            <i class="fa fa-heart"></i>
          </label>

          <a href="{{ route('admin.edit-profile') }}" class="btn btn-primary mb-5">Edit Profile</a>
        </div>

        <div class="box-body text-center pb-50">
          <a href="#">
            <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($admin->profile_photo_path)) ?
            url($admin->profile_photo_path) : asset('backend/no-image.jpg') }}" alt="">
          </a>
          <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Admin Name: {{ $admin->name }}</a></h4>
          <span><i class="fa fa-map-marker w-20"></i> Admin Email: {{ $admin->email }}</span>
        </div>

        <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
          <li>
            <span class="opacity-60">Followers</span><br>
            <span class="font-size-20">8.6K</span>
          </li>
          <li>
            <span class="opacity-60">Following</span><br>
            <span class="font-size-20">8457</span>
          </li>
          <li>
            <span class="opacity-60">Tweets</span><br>
            <span class="font-size-20">2154</span>
          </li>
        </ul>
      </div>

  </div>
</section>

@endsection

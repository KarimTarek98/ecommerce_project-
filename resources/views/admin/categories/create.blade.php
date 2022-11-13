@extends('admin.admin_master')

@section('title')
    Add New Category | Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <x-forms.breadcrumb section="Categories" page="Add New" />

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="box">
                <x-forms.form-header>
                    Add New Categories
                </x-forms.form-header>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <div class="col">
                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <x-forms.input-group head="Category Name En" inputName="category_name_en" type="text"
                                    name="category_name_en" />

                                <x-forms.input-group head="Category Name Ar" inputName="category_name_ar" type="text"
                                    name="category_name_ar" />

                                <x-forms.input-group head="Category Icon" inputName="category_icon" type="text"
                                    name="category_icon" />

                                <x-forms.submit-button value="Store Category" />
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

@extends('app.main_master')

@section('title')
    My Wishlist | Starbuy Store
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Wishlist</a></li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    <div class="body-content">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="heading-title">My Wishlist</th>
                                    </tr>
                                </thead>
                                <tbody id="wishlist_items">

                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <br><br>
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

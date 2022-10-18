@extends('app.main_master')

@section('title')
    My Cart | Starbuy Store
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">My Cart</a></li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
					<th class="cart-romove item">Image</th>
					<th class="cart-description item">Product Name</th>
					<th class="cart-edit item">Quantity</th>
					<th class="cart-qty item">Size</th>
					<th class="cart-sub-total item">Total</th>
					<th class="cart-total last-item">Color</th>
					<th class="cart-total last-item">Remove</th>
				</tr>
                                </thead>
                                <tbody id="my_cart">



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

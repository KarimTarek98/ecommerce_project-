<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @php
            $hotDeals = App\Models\Product::where('hot_deals', 1)
            ->where('discount_price', '!=', NULL)
            ->orderBy('id', 'DESC')->limit(3)->get();
        @endphp

        @foreach ($hotDeals as $deal)
        <div class="item">
            <div class="products">
                <div class="hot-deal-wrapper">
                    <div class="image"> <img src="{{ asset($deal->product_thumbnail) }}"
                            alt=""> </div>
                    <div class="sale-offer-tag">
                        @php
                            $discount = ($deal->selling_price - $deal->discount_price) / $deal->selling_price;
                            $discountPercent = $discount * 100;
                        @endphp
                        @if ($deal->discount_price != null)
                        <span>{{ round($discountPercent) }}%<br>
                            off
                        </span>
                        @endif
                    </div>
                    <div class="timing-wrapper">
                        <div class="box-wrapper">
                            <div class="date box"> <span class="key">120</span> <span
                                    class="value">DAYS</span> </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="hour box"> <span class="key">20</span> <span
                                    class="value">HRS</span> </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="minutes box"> <span class="key">36</span> <span
                                    class="value">MINS</span> </div>
                        </div>
                        <div class="box-wrapper hidden-md">
                            <div class="seconds box"> <span class="key">60</span> <span
                                    class="value">SEC</span> </div>
                        </div>
                    </div>
                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                    <h3 class="name">
                        <a href="{{ url('product-details/' . $deal->id . '/' . $deal->product_slug_en) }}">
                            {{ (session()->get('lang') == 'ar') ? $deal->product_name_ar : $deal->product_name_en  }}
                        </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price">
                        @if ($deal->discount_price != null)
                        <span class="price">
                            EGP {{ $deal->discount_price }}
                        </span>
                        <span class="price-before-discount">
                            {{ $deal->selling_price }}
                        </span>
                        @else
                        <span class="price">
                            EGP {{ $deal->selling_price }}
                        </span>
                        @endif

                    </div>
                    <!-- /.product-price -->

                </div>
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <div class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" type="button"
                                                                title="Add Cart" data-toggle="modal"
                                                                data-target="#exampleModal" id="{{ $deal->id }}" onclick="getProduct(this.id)">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>

                                                            <button class="btn btn-primary cart-btn" type="button">Add to
                                                                cart</button>
                        </div>
                    </div>
                    <!-- /.action -->
                </div>
                <!-- /.cart -->
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.sidebar-widget -->
</div>

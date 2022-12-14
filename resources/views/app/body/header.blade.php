<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>
                                @if (App::getLocale() == 'ar')
                                    حسابي
                                @else
                                    My Account
                                @endif
                            </a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>
                                @if (App::getLocale() == 'ar')
                                    قائمة الرغبات
                                @else
                                    Wishlist
                                @endif
                            </a></li>
                        <li><a href="{{ route('my-cart') }}">
                                @if (App::getLocale() == 'ar')
                                    مشترياتي <i class="icon fa fa-shopping-cart"></i>
                                @else
                                    My Cart <i class="icon fa fa-shopping-cart"></i>
                                @endif
                            </a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>
                                @if (App::getLocale() == 'ar')
                                    الدفع
                                @else
                                    Checkout
                                @endif
                            </a></li>

                        @auth
                            <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>Profile</a></li>
                        @else
                            <li><a href="{{ url('/login') }}"><i class="icon fa fa-lock"></i>
                                    @if (App::getLocale() == 'ar')
                                        حساب جديد | تسجيل
                                    @else
                                        Login | Register
                                    @endif
                                </a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">EGP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">
                                    @if (session()->get('lang') == 'ar')
                                        اللغة
                                    @else
                                        Language
                                    @endif
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                {{-- @if (session()->get('lang') == 'ar')
                                    <li><a href="">English</a></li>

                                @else
                                    <li><a href="">العربية</a></li>

                                @endif --}}
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                                {{-- {{ route('lang.en') }} --}}
                                {{-- {{ route('lang.ar') }} --}}
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{ url('/') }}">
                            <h1 class="app-logo">Starbuy</h1>
                        </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="items_count"></span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                        class="total-price"> <span class="sign">$</span><span class="value"
                                            id="total_price"></span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                {{-- Cart Items --}}
                                <div id="cart_items">

                                </div>

                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span
                                            class='price' id="sub_total">$</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown"
                                        class="dropdown-toggle" data-toggle="dropdown">
                                        {{ trans('header-nav.Home') }}
                                    </a>
                                </li>

                                @php
                                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp

                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">
                                            {{ trans('header-nav.' . strtolower(str_replace(' ', '_', $category->category_name_en))) }}
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">

                                                        @php
                                                            $subCategories = App\Models\SubCategory::where('category_id', $category->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->get();
                                                        @endphp

                                                        @foreach ($subCategories as $subCategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                <a
                                                                    href="{{ url('products/' . $subCategory->id . '/' . $subCategory->subcategory_name_en) }}">
                                                                    <h2 class="title">
                                                                        {{ trans('header-nav.' . strtolower(str_replace(' ', '_', $subCategory->subcategory_name_en))) }}
                                                                    </h2>
                                                                </a>
                                                                <ul class="links">
                                                                    @php
                                                                        $subSubCategories = App\Models\SubSubCategory::where('subcategory_id', '=', $subCategory->id)
                                                                            ->orderBy('id', 'DESC')
                                                                            ->get();
                                                                    @endphp
                                                                    @foreach ($subSubCategories as $subSubCategory)
                                                                        <li><a
                                                                                href="{{ url('products/sub&sub/' . $subSubCategory->id . '/' . $subSubCategory->sub_sub_category_slug_en) }}">
                                                                                @if (App::getLocale() == 'ar')
                                                                                    {{ $subSubCategory->sub_sub_category_name_ar }}
                                                                                @else
                                                                                    {{ $subSubCategory->sub_sub_category_name_en }}
                                                                                @endif

                                                                            </a></li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                            <!-- /.col -->
                                                        @endforeach

                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach

                                <li class="dropdown  navbar-right special-menu"> <a href="#">
                                        @if (App::getLocale() == 'ar')
                                            عروض اليوم
                                        @else
                                            Todays offer
                                        @endif
                                    </a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

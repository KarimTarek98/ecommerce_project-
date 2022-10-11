@php
    $prefix = Request::route()->getPrefix();
    $route = Route::currentRouteName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Star</b>buy</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == 'admin/partners') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Partners</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.all-partners') ? 'active' : '' }}">
                        <a href="{{ route('admin.all-partners') }}"><i class="ti-more"></i>All Partners</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/categories') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.all-categories') ? 'active' : '' }}">
                        <a href="{{ route('admin.all-categories') }}">
                            <i class="ti-more"></i>
                            All Categories
                        </a>
                    </li>
                    <li class="{{ ($route == 'admin.subcategories') ? 'active' : '' }}">
                        <a href="{{ route('admin.subcategories') }}">
                            <i class="ti-more"></i>
                            All Sub Categories
                        </a>
                    </li>
                    <li class="{{ ($route == 'admin.sub-subcategories') ? 'active' : '' }}">
                        <a href="{{ route('admin.sub-subcategories') }}">
                            <i class="ti-more"></i>
                            Sub Sub-Categories
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/products') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.add-product') ? 'active' : '' }}"><a href="{{ route('admin.add-product') }}"><i class="ti-more"></i>Add Product</a></li>
                    <li class="{{ ($route == 'admin.manage-products') ? 'active' : ''  }}"><a href="{{ route('admin.manage-products') }}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>

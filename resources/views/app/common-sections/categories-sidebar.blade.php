<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">


            @foreach ($categories as $category)
            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
                    data-toggle="dropdown"><i class="icon {{ $category->category_icon }}"
                        aria-hidden="true"></i>
                        {{ (session()->get('lang') == 'ar') ? $category->category_name_ar : $category->category_name_en }}
                    </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                                $subCategories = App\Models\SubCategory::where('category_id', $category->id)
                                ->latest()->get();
                            @endphp

                            @foreach ($subCategories as $subCategory)
                            <div class="col-sm-12 col-md-3">
                                <h2 class="title">
                                    @if (session()->get('lang') == 'ar')
                                        {{ $subCategory->subcategory_name_ar }}
                                    @else
                                        {{ $subCategory->subcategory_name_en }}
                                    @endif

                                </h2>
                                <ul class="links list-unstyled">
                                    @php
                                        $subSubCategories = App\Models\SubSubCategory::where('subcategory_id', $subCategory->id)
                                            ->orderBy('id', 'DESC')->get();
                                    @endphp
                                    @foreach ($subSubCategories as $subSubCategory)
                                    <li>
                                        <a href="#">
                                            {{ (session()->get('lang') == 'ar') ? $subSubCategory->sub_sub_category_name_ar : $subSubCategory->sub_sub_category_name_en }}
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            @endforeach
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- /.menu-item -->

            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>

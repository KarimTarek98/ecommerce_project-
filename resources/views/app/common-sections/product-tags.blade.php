<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    @php
        $productTagsEn =  App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();

    @endphp
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @foreach ($productTagsEn as $tag)
                @php
                    $tagArr = explode(',', $tag->product_tags_en);
                @endphp
                @foreach ($tagArr as $item)
                <a class="item active" title="{{ $item }}" href="{{ url('products/' . $item) }}">{{ $item }}</a>
                @endforeach

            @endforeach

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>

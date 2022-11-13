{{-- class="row" --}}
<div {{ $attributes->merge([
    'class' => 'row'
    ]) }} style="margin-bottom: 30px">
    <div class="col-md-12">
        {{ $slot }}
    </div>
</div>

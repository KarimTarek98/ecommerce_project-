<div {{ $attributes->merge(['class' => 'controls']) }}>
    {{ $slot }}
    <div class="help-block"></div>
    @error($inputName)
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

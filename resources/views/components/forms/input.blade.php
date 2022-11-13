@props([
    'type' => $type,
    'name' => $name,
])
<input type="{{ $type }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'form-control']) }}
    data-validation-required-message="This field is required">

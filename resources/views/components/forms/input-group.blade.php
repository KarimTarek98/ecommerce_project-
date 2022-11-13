
@props(['min' => ''])
<x-forms.input-row {{ $attributes->merge([
    'head' => $head,
    'inputName' => $name,
    'type' => $type,
    'name' => $name,

]) }}>
    <x-forms.input-label head="{{ $head }}" />
    <x-forms.input-wrapper inputName="{{ $name }}">
        <x-forms.input type="{{ $type }}" name="{{ $name }}" min="{{ $min }}" />
    </x-forms.input-wrapper>
</x-forms.input-row>

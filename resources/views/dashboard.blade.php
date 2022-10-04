<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Welcome to our Dashboard {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        Welcome to Dashboard
    </div>
</x-app-layout>

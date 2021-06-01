<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Products') }}
        </h2>
    </x-slot>

    @livewire('products.show-list')

    @livewire('alert')

</x-app-layout>

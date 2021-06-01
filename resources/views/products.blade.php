<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Products') }}
        </h2>
    </x-slot>

    <div style="position: absolute;
    top: 10%;
    right: 10%;
    width: 44%;">        
        <img src="{{asset('images/home.svg')}}">
    </div>

    <div class="mt-96">
        @livewire('products.show-list')
    </div>

</x-app-layout>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 mt-24">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-2">
                    <div class="text-xl font-semibold md:flex md:items-center sm:hidden md:block">
                        Populer Products
                    </div>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="search" name="search" wire:model.lazy="search" wire:keydown.enter="$refresh"
                            class="focus:ring-black focus:border-black block w-full pl-7 sm:text-sm border-gray-300 rounded-md"
                            placeholder="Search here what you are looking for...">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if (count($products)>0)
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($products as $product)
                            <li>
                                @livewire('products.card', ['product' => $product], key($product->id))
                            </li>
                        @endforeach
                    </ul>
                    <div class="my-4">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="text-lg">
                        Sorry. We cannot found what you are looking for.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

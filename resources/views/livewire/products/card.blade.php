<div class="shadow bg-white rounded-lg h-18">
    <div class="flex">
        <div class="flex-none w-48 relative">
            <img src="{{ $defaultImage }}" alt="" class="absolute inset-0 w-full h-full object-cover" />
        </div>
        <form class="flex-auto p-6">
            <div class="flex flex-wrap mb-6">
                <h1 class="flex-auto text-xl font-semibold">
                    {{ $product->title }}
                </h1>
                <div class="text-xl font-semibold text-gray-500">
                    LKR {{ $product->price }}
                </div>
                <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
                    In stock
                </div>
            </div>

            <div class="flex space-x-3 text-sm font-medium">
                <div class="flex-auto flex space-x-3">
                    <button class="w-1/2 flex items-center justify-center rounded-md bg-black text-white"
                        type="submit">Add to bag</button>
                    <button class="w-1/2 flex items-center justify-center rounded-md border border-gray-300"
                        type="button" wire:click="viewProduct">View more</button>
                </div>
                <button
                    class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300"
                    type="button" aria-label="like">
                    <svg width="20" height="20" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-1 sm:grid-cols-2 sm:px-8 sm:py-12 sm:gap-x-8 md:py-16">
                    <div
                        class="relative z-10 col-start-1 row-start-1 px-4 pt-40 pb-3 bg-gradient-to-t from-black sm:bg-none">
                        <p class="text-sm font-medium text-white sm:mb-1 sm:text-gray-500">{{ $product->category->type }} | {{ $product->category->title }}</p>
                        <h2 class="text-xl font-semibold text-white sm:text-2xl sm:leading-7 sm:text-black md:text-3xl">
                            {{ $product->title }}</h2>
                    </div>
                    <div class="col-start-1 row-start-2 px-4 sm:pb-16">
                        <div class="flex items-center text-sm font-medium my-5 sm:mt-2 sm:mb-4">
                            <svg width="20" height="20" fill="currentColor" class="text-violet-600">
                                <path
                                    d="M9.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.784-.57-.381-1.81.587-1.81H7.03a1 1 0 00.95-.69L9.05 3.69z" />
                            </svg>
                            <div class="ml-1">
                                <span class="text-black">4.94</span>
                                <span class="sm:hidden md:inline">(128)</span>
                            </div>
                        </div>
                        <hr class="w-16 border-gray-300 hidden sm:block">
                    </div>
                    <div class="col-start-1 row-start-3 space-y-3 px-4">
                        <div class="flex flex-wrap">
                            <div class="text-xl font-semibold text-gray-500">
                                LKR {{ $product->price }}
                            </div>
                            <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
                                In stock
                            </div>
                        </div>
                        <div class="flex space-x-3 mb-4 text-sm font-medium">
                            <div class="flex-auto flex space-x-3">
                                <button class="w-1/2 flex items-center justify-center rounded-md bg-black text-white"
                                    type="submit">Add to bag</button>
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
                    </div>
                    <div class="col-start-1 row-start-1 flex sm:col-start-2 sm:row-span-3">
                        <div class="w-full grid grid-cols-3 grid-rows-2 gap-2">
                            <div class="relative col-span-3 row-span-2 md:col-span-2">
                                <img src="{{ $defaultImage }}" alt=""
                                    class="absolute inset-0 w-full h-full object-cover bg-gray-100 sm:rounded-lg" />
                            </div>
                            @isset($secondImage)
                                <div class="relative hidden md:block">
                                    <img src="{{ $secondImage }}" alt=""
                                        class="absolute inset-0 w-full h-full object-cover rounded-lg bg-gray-100" />
                                </div>
                            @endisset
                            @isset($thirdImage)
                                <div class="relative hidden md:block">
                                    <img src="{{ $thirdImage }}" alt=""
                                        class="absolute inset-0 w-full h-full object-cover rounded-lg bg-gray-100" />
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:px-8 sm:py-12 sm:gap-x-8 md:py-16">
                    {{$product->description}}
                </div>
            </div>
        </div>  
    </div>

</div>

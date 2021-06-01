<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-16">
                <div class="p-20">
                    <table class="w-full font-medium leading-6 text-gray-900 font-semibold" cellspacing="0">
                        <thead>
                            <tr class="h-12">
                                <th class="text-left">Product</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline">Quantity</span>
                                </th>
                                <th class="hidden text-right md:table-cell">Unit Price (LKR)</th>
                                <th class="text-right">Total Price (LKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cartItems as $cartItem)
                                @php
                                    $total += $cartItem->product->price;
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('product.show', $cartItem->product) }}">
                                            <p class="mb-2 md:ml-4">{{ $cartItem->product->title }}</p>
                                            <button type="button" wire:click="removeItem({{ $cartItem->id }})"
                                                class="text-red-500 hover:text-red-700 md:ml-4 mb-6">
                                                <small>Remove item</small>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm lg:text-base font-medium">
                                            1
                                        </span>
                                    </td>
                                    {{-- <td class="justify-center md:justify-end md:flex mt-6">
                                    <div class="w-20 h-10">
                                        <div class="relative flex flex-row w-full h-8">
                                            <input type="number" value="1"
                                                class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                        </div>
                                    </div>
                                </td> --}}
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm lg:text-base font-medium">
                                            {{ number_format($cartItem->product->price, 2) }}
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-sm lg:text-base font-medium">
                                            {{ number_format($cartItem->product->price, 2) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr class="pb-6 mt-6">
                    <div class="my-4 mt-6 -mx-2 lg:flex">
                        <div class="lg:px-2 lg:w-1/2">
                            <div class="p-4">
                                <h1 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Instruction for
                                    seller</h1>
                                <p class="mt-2 text-sm text-gray-600">If you have some information for the seller you
                                    can leave them in the box below</p>
                            </div>
                            <div class="p-4">
                                <textarea class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
                            </div>
                        </div>
                        <div class="lg:px-2 lg:w-1/2">
                            <div class="p-4">
                                <h1 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Order Details</h1>
                                <p class="mt-2 text-sm text-gray-600">Shipping and additionnal costs are calculated
                                    based on values you have entered</p>
                            </div>
                            <div class="p-4">
                                <div class="flex justify-between border-b">
                                    <div
                                        class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Subtotal
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        LKR {{ number_format($total, 2) }}
                                    </div>
                                </div>
                                <div class="flex justify-between pt-4 border-b">
                                    <div
                                        class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Tax
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        LKR {{ number_format($tax, 2) }}
                                    </div>
                                </div>
                                <div class="flex justify-between pt-4 border-b">
                                    <div
                                        class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Total
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        LKR {{ number_format($total + $tax, 2) }}
                                    </div>
                                </div>
                                <a href="#">
                                    <button
                                        class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                        </svg>
                                        <span class="ml-2 mt-5px">Procceed to checkout</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

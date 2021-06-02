<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-12">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">My Orders</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here is your all orders which made in our shop.
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @if (count($carts) > 0)
                    <div class="p-20">
                        <table class="w-full font-medium leading-6 text-gray-900 font-semibold" cellspacing="0">
                            <thead>
                                <tr class="h-12">
                                    <th class="text-left">Product</th>
                                    <th class="hidden text-right md:table-cell">Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Ordered at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <a href="{{ route('product.show', $cart->product_id) }}">
                                                <p class="mb-4">{{ $cart->product->title }}</p>
                                            </a>
                                        </td>
                                        <td class="hidden text-right md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                LKR {{ number_format($cart->product->price, 2) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-sm lg:text-base font-medium text-white bg-black px-4 py-0.5 rounded-full">
                                                {{ $cart->order->status }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $cart->order->created_at }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @else
                    <div class="p-20 text-center">
                        You haven't made any oders from our shop.
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if ($showModel)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Congratulations!
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        You have successfully place your order. We will contact you soon with your
                                        products.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            onclick="location.href=`{{ route('products') }}`">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

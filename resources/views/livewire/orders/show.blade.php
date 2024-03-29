<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-12">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">My Order #{{ $order->id }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here is all products which I have ordered previously.
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @if (count($cartItems) > 0)
                    <div class="p-12">
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
                                                <p class="mb-8 md:ml-4">{{ $cartItem->product->title }}</p>
                                            </a>
                                        </td>
                                        <td class="hidden text-right md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                1
                                            </span>
                                        </td>
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
                                    <h1 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Instruction
                                        for
                                        seller</h1>
                                    {{-- <p class="mt-2 text-sm text-gray-600">If you have some information for the seller you
                                    can leave them in the box below</p> --}}
                                </div>
                                <div class="p-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        Receiver Name
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" readonly
                                            class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            value="{{ $order->contact_name }}">
                                    </div>
                                    <x-input-error for="receiver.name" class="mt-2" />

                                    <label for="contact" class="block text-sm font-medium text-gray-700 mt-4">
                                        Contact Number
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="contact" id="contact"
                                            class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            readonly value="{{ $order->contact_phone }}">
                                    </div>
                                    <x-input-error for="receiver.contact" class="mt-2" />

                                    <label for="address" class="block text-sm font-medium text-gray-700 mt-4">
                                        Delivery Address
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="address" name="address" rows="3" readonly
                                            class="shadow-sm focus:ring-black focus:border-black mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $order->contact_address }}</textarea>
                                    </div>
                                    <x-input-error for="receiver.address" class="mt-2" />

                                </div>

                            </div>
                            <div class="lg:px-2 lg:w-1/2">
                                <div class="p-4">
                                    <h1 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Order Details
                                    </h1>
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
                                    <div class="flex justify-end mt-8">
                                        <span
                                            class="text-sm lg:text-base font-medium text-white bg-black px-4 py-0.5 rounded-full">
                                            @switch($order->status)
                                                @case("waitPayment")
                                                    waiting for payment
                                                @break
                                                @case("onTheWay")
                                                    on the way
                                                @break
                                                @default
                                                    {{ $order->status }}
                                            @endswitch
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @can('update', $order)                            
                        <hr class="pb-6 mt-6">
                        @livewire('orders.process', ['order' => $order])
                        @endcan
                    </div>
                @else
                    <div class="p-20 text-center">
                        Your bag doesn't have any products.
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if ($total !== $order->total)
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
                                    Opps!
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Something wrong with order information. Please contact our assistant.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            onclick="location.href=`{{ route('orders') }}`">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

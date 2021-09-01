<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-12 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Manage Orders</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here is your all orders for our shop.
                    </p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('orders.summary') }}" 
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                        Montly Summary
                    </a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @if (count($orders) > 0)
                    <div class="p-12">
                        <table class="w-full font-medium leading-6 text-gray-900 font-semibold divide-y divide-gray-200"
                            cellspacing="0">
                            <thead>
                                <tr class="h-12">
                                    <th class="text-left">Order Id</th>
                                    <th class="text-left">Customer</th>
                                    <th class="hidden text-right md:table-cell">Amount</th>
                                    <th class="text-center">Method</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Ordered at</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="h-12">
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}">
                                                <p class="mb-4">#{{ $order->id }}</p>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->user->name }}
                                            </span>
                                        </td>
                                        <td class="hidden text-right md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                LKR {{ number_format($order->total, 2) }}
                                            </span>
                                        </td>
                                        <td class="hidden text-center md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->payment_type }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="text-sm lg:text-base font-medium text-white bg-black px-4 py-0.5 rounded-full">
                                                @switch($order->status)
                                                    @case(" waitPayment")
                                                        waiting for payment
                                                    @break
                                                    @case(" onTheWay")
                                                        on the way
                                                    @break
                                                    @default
                                                        {{ $order->status }}
                                                @endswitch
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->created_at }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="p-20 text-center">
                        No one place orders.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

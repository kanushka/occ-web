<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-12">
                <div class="flex justify-center md:justify-between items-start mb-8">
                    <div class="text-xl font-bold text-center mb-4">{{ $month }} Month Orders Summary</div>
                    <a href="#print" onclick="window.print()"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md 
                        text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black hidden sm:block">
                        Print
                    </a>
                </div>
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Received Payments</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here is your all delivered orders
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden    sm:rounded-lg mt-4">
                @if (count($deliveredOrders) > 0)
                    <div class="p-12">
                        <table class="w-full font-medium leading-6 text-gray-900 font-semibold divide-y divide-gray-200"
                            cellspacing="0">
                            <thead>
                                <tr class="h-12">
                                    <th class="text-left">Order Id</th>
                                    <th class="text-center">Ordered at</th>
                                    <th class="text-left">Customer</th>
                                    <th class="text-center">Method</th>
                                    <th class=" text-right md:table-cell">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalDeliveredOrders = 0;
                                @endphp
                                @foreach ($deliveredOrders as $order)
                                    <tr class="h-12">
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}">
                                                <p class="mb-4">#{{ $order->id }}</p>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->created_at }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->user->name }}
                                            </span>
                                        </td>
                                        <td class=" text-center md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->payment_type }}
                                            </span>
                                        </td>
                                        <td class=" text-right md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                LKR {{ number_format($order->total, 2) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @php
                                        $totalDeliveredOrders += $order->total;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="mt-4 flex justify-end">
                            <div class="text-lg font-bold mr-8">Received Payments Total</div>
                            <div class="text-lg font-bold">LKR {{ number_format($totalDeliveredOrders, 2) }}</div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mt-6">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Processing Payments</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here is your all ongoing orders.
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden    sm:rounded-lg mt-4">
                @if (count($processingOrders) > 0)
                    <div class="p-12">
                        <table class="w-full font-medium leading-6 text-gray-900 font-semibold divide-y divide-gray-200"
                            cellspacing="0">
                            <thead>
                                <tr class="h-12">
                                    <th class="text-left">Order Id</th>
                                    <th class="text-center">Ordered at</th>
                                    <th class="text-left">Customer</th>
                                    <th class="text-center">Method</th>
                                    <th class=" text-right md:table-cell">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalProcessingOrders = 0;
                                @endphp
                                @foreach ($processingOrders as $order)
                                    <tr class="h-12">
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}">
                                                <p class="mb-4">#{{ $order->id }}</p>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->created_at }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->user->name }}
                                            </span>
                                        </td>
                                        <td class=" text-center md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->payment_type }}
                                            </span>
                                        </td>
                                        <td class=" text-right md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                LKR {{ number_format($order->total, 2) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @php
                                        $totalProcessingOrders += $order->total;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="mt-4 flex justify-end">
                            <div class="text-lg font-bold mr-8">Processing Payments Total</div>
                            <div class="text-lg font-bold">LKR {{ number_format($totalProcessingOrders, 2) }}</div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mt-6">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Waiting Payments</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here is your all waiting card payments.
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden    sm:rounded-lg mt-4">
                @if (count($waitPaymentOrders) > 0)
                    <div class="p-12">
                        <table class="w-full font-medium leading-6 text-gray-900 font-semibold divide-y divide-gray-200"
                            cellspacing="0">
                            <thead>
                                <tr class="h-12">
                                    <th class="text-left">Order Id</th>
                                    <th class="text-center">Ordered at</th>
                                    <th class="text-left">Customer</th>
                                    <th class="text-center">Method</th>
                                    <th class=" text-right md:table-cell">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalWaitPaymentOrders = 0;
                                @endphp
                                @foreach ($waitPaymentOrders as $order)
                                    <tr class="h-12">
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}">
                                                <p class="mb-4">#{{ $order->id }}</p>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->created_at }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->user->name }}
                                            </span>
                                        </td>
                                        <td class=" text-center md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $order->payment_type }}
                                            </span>
                                        </td>
                                        <td class=" text-right md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                LKR {{ number_format($order->total, 2) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @php
                                        $totalWaitPaymentOrders += $order->total;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="mt-4 flex justify-end">
                            <div class="text-lg font-bold mr-8">Waiting Payments Total</div>
                            <div class="text-lg font-bold">LKR {{ number_format($totalWaitPaymentOrders, 2) }}</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

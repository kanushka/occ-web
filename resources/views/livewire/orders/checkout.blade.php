<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid">
            <div class="mt-24">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Checkout Order</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Please provide your more information to process the order.
                    </p>
                </div>
            </div>
            <div class="mt-5">
                <form method="post" action="{{Config::get('payment.payhere.url')}}">   
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-4 gap-6 text-lg">
                                <div class="col-span-2">
                                    Order id # {{ $order->id }}
                                </div>
                                <div class="col-span-2">
                                    Total amount: LKR {{ number_format($order->total, 2) }}
                                </div>
                            </div>
                        </div>

                        <div>
                            <input type="hidden" name="merchant_id" value="{{ Config::get('payment.payhere.id') }}">
                            <input type="hidden" name="return_url" value="{{ route('cart.show') }}">
                            <input type="hidden" name="cancel_url" value="{{ route('cart.show') }}">
                            <input type="hidden" name="notify_url" value="{{ route('orders.notify', $order) }}">
                            <input type="hidden" name="country" value="Sri Lanka">

                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="items" value="{{$user->name}} order #{{$order->id}}">
                            <input type="hidden" name="currency" value="LKR">
                            <input type="hidden" name="amount" value="{{ $order->total }}">

                            @foreach ($cartItems as $key => $item)
                                <input type="hidden" name="item_name_{{ $key }}"
                                    value="{{ $item->product->title }}">
                                <input type="hidden" name="quantity_{{ $key }}"
                                    value="{{ $item->quantity }}">
                                <input type="hidden" name="amount_{{ $key }}"
                                    value="{{ $item->product->price }}">
                            @endforeach
                        </div>

                        <hr>

                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-2">
                                    <label for="fname" class="block text-sm font-medium text-gray-700">
                                        First Name
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="first_name" id="fname"
                                            class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            value="{{ count(explode(' ', $user->name)) > 0 ? explode(' ', $user->name)[0] : '' }}">
                                    </div>
                                </div>

                                <div class="col-span-2">
                                    <label for="lname" class="block text-sm font-medium text-gray-700">
                                        Last Name
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="last_name" id="lname"
                                            class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            value="{{ count(explode(' ', $user->name)) > 1 ? explode(' ', $user->name)[1] : '' }}">
                                    </div>
                                </div>

                                <div class="col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Email
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="email" id="email"
                                            class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            placeholder="example@mail.com" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="col-span-2">
                                    <label for="contact" class="block text-sm font-medium text-gray-700">
                                        Contact
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="phone" id="contact"
                                            class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            placeholder="071 XXX XXXX" value={{ $order->contact_phone }}>
                                    </div>
                                </div>

                                <div class="col-span-4">
                                    <label for="address" class="block text-sm font-medium text-gray-700">
                                        Address
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="address" name="address" rows="3"
                                            class="shadow-sm focus:ring-black focus:border-black mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $order->contact_address }}</textarea>
                                    </div>
                                </div>

                                <div class="col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">
                                        City
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="city" id="city"
                                            class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                            placeholder="Colombo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

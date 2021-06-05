<div>
    <div class="p-4">
        <h1 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Manage Order
        </h1>
        <p class="mt-2 text-sm text-gray-600">Chnage order status and assing to your crew mate to dispach the order.</p>

        <div class="mt-8 w-1/2">
            <div class="flex items-center">
                <label for="type" class="block text-sm font-medium text-gray-700 w-36 mr-4">Order Status</label>
                <select id="type" name="type" wire:model="order.status"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                    <option value="waitPayment">waiting for payment</option>
                    <option value="processing">processing</option>
                    <option value="onTheWay">on the way</option>
                    <option value="delivered">delivered</option>
                    <option value="closed">closed</option>
                </select>
                <div>
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-black text-white text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="save">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

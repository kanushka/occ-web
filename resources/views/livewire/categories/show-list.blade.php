<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-12 flex justify-between">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Product Categories</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Here is our product categories.
                    </p>
                </div>
                <div>
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-black text-white text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="showNew">
                        Add New Category
                    </button>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                @if (count($categories) > 0)
                    <div class="p-12">
                        <table class="w-full font-medium leading-6 text-gray-900 font-semibold divide-y divide-gray-200"
                            cellspacing="0">
                            <thead>
                                <tr class="h-12">
                                    <th class="text-left">Category Id</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="h-12">
                                        <td>
                                            <span class="text-sm lg:text-base font-medium">
                                                #{{ $category->id }}
                                            </span>
                                        </td>
                                        <td class="hidden text-center md:table-cell">
                                            <span
                                                class="text-sm lg:text-base font-medium text-white bg-black px-4 py-0.5 rounded-full">
                                                {{ $category->type }}
                                            </span>
                                        </td>
                                        <td class="hidden text-center md:table-cell">
                                            <span class="text-sm lg:text-base font-medium">
                                                {{ $category->title }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a wire:click="showEdit({{ $category->id }})"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                @else
                    <div class="p-20 text-center">
                        There are no any product categories.
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
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 h-4">
                                {{ $modelTitle }}
                                <hr>
                            </div>
                            <div class="col-span-3">
                                <label for="title" class="block text-sm font-medium text-gray-700">
                                    Title
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="title" id="title" wire:model="category.title"
                                        class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                        placeholder="modern">
                                </div>
                                <x-input-error for="category.title" class="mt-2" />
                            </div>

                            <div class="col-span-2">
                                <label for="type" class="block text-sm font-medium text-gray-700">Product
                                    Type</label>
                                <select id="type" name="type" wire:model="category.type"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                                    <option>plan</option>
                                    <option>hardware</option>
                                </select>
                                <x-input-error for="category.type" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-black text-white text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="save">
                            Save
                        </button>
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="$toggle('showModel')">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

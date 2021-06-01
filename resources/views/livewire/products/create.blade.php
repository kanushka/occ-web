<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid">
            <div class="mt-24">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 font-semibold">Add Product</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This product information will be displayed publicly so be careful what you share.
                    </p>
                </div>
            </div>
            <div class="mt-5">
                <form wire:submit.prevent="save">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                        Title
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="title" id="title" wire:model="product.title"
                                        class="focus:ring-black focus:border-black flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                        placeholder="Apple Home Designs">
                                    </div>
                                    <x-input-error for="product.title" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Description
                                </label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="3" wire:model="product.description"
                                        class="shadow-sm focus:ring-black focus:border-black mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                                <x-input-error for="product.description" class="mt-2" />
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description about product
                                </p>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                  <label for="price" class="block text-sm font-medium text-gray-700">
                                    Price
                                  </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                      LKR
                                    </span>
                                    <input type="text" name="price" id="price" wire:model="product.price" class="focus:ring-black focus:border-black flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                  </div>
                                  <x-input-error for="product.price" class="mt-2" />
                                </div>
                              </div>

                              <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-6 sm:col-span-3">
                                <label for="category" class="block text-sm font-medium text-gray-700">Product Type / Category</label>
                                <select id="category" name="category" wire:model="product.product_category_id" autocomplete="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                                  @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->type}} / {{$category->title}}</option>     
                                  @endforeach
                                </select>
                                <x-input-error for="product.product_category_id" class="mt-2" />
                              </div>
                              </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    Product photos
                                </label>
                                <div
                                    class="mt-1 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    @if ($photos)
                                        @foreach ($photos as $photo) 
                                        <div class="w-32 mh-32">
                                            <img class="inline" src="{{ $photo->temporaryUrl() }}">
                                        </div>                                     
                                        @endforeach
                                    @endif
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-black hover:text-black focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-black">
                                                <span>Upload maximun 3 file</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only" wire:model="photos" multiple>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                                <x-input-error for="photos.*" class="mt-2" />
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

<x-modal name="add-product-modal" maxWidth="3xl">
    <div class="p-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('Add New Product') }}</h3>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="product_name" class="block font-medium text-sm text-gray-700">{{ __('Product Name') }}</label>
                    <input id="product_name" name="product_name" type="text" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-rose-500 focus:ring-rose-500" 
                           required value="{{ old('product_name') }}" />
                    @error('product_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="category_id" class="block font-medium text-sm text-gray-700">{{ __('Category') }}</label>
                    <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-rose-500 focus:ring-rose-500" required>
                        <option value="">Select Category</option>
                        {{-- **IMPORTANT: Looping the categories here** --}}
                        {{-- Kinuha natin ang Product Model sa Controller, so dapat available ang categories dito. --}}
                        @php
                            // Ito ay magche-check lang sa database; mas malinis kung ipapasa mo ito sa view.
                            $allCategories = \App\Models\ProductCategory::all();
                        @endphp

                        @foreach ($allCategories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                        
                    </select>
                    @error('category_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="price" class="block font-medium text-sm text-gray-700">{{ __('Price ($)') }}</label>
                    <input id="price" name="price" type="number" step="0.01" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-rose-500 focus:ring-rose-500" 
                           required value="{{ old('price') }}" />
                    @error('price')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="stock" class="block font-medium text-sm text-gray-700">{{ __('Stock Quantity') }}</label>
                    <input id="stock" name="stock" type="number" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-rose-500 focus:ring-rose-500" 
                           required value="{{ old('stock') }}" />
                    @error('stock')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="long_description" class="block font-medium text-sm text-gray-700">{{ __('Long Description') }}</label>
                    <textarea id="long_description" name="long_description" rows="5" 
                              class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-rose-500 focus:ring-rose-500">{{ old('long_description') }}</textarea>
                    @error('long_description')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="button" x-on:click="$dispatch('close-modal')" class="px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 transition duration-150 mr-3">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" class="px-6 py-2 bg-rose-600 text-white font-bold rounded-md hover:bg-rose-700 transition duration-150">
                    {{ __('Create Product') }}
                </button>
            </div>
        </form>
    </div>
</x-modal>
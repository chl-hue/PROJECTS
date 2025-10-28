<x-app-layout active="products">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Product Management') }}
        </h2>
        <p class="text-sm text-gray-500">Manage your product inventory and add new items here.</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-full mx-auto px-6 lg:px-8">

            {{-- ✅ Success Message --}}
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            {{-- 🧭 Header --}}
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">
                    Products ({{ $products->count() }})
                </h3>

                {{-- 🔘 Add New Product Button --}}
                <button 
                    x-data
                    x-on:click.prevent="$dispatch('open-modal', 'add-product-modal')" 
                    class="flex items-center px-4 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition duration-150 shadow-lg shadow-rose-200/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('Add New Product') }}
                </button>
            </div>

            {{-- 📋 Products Table --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" class="w-12 h-12 rounded object-cover">
                                            @else
                                                <span class="text-gray-400">No image</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $product->category->name ?? '—' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">₱{{ number_format($product->price, 2) }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $product->stock }}</td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    onclick="return confirm('Are you sure you want to delete this product?')"
                                                    class="text-gray-500 hover:text-gray-700 font-semibold">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                            No products found. Add a new product to begin.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 🟢 Add Product Modal --}}
    <x-modal name="add-product-modal" maxWidth="2xl">
        <div class="p-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('Add New Product') }}</h3>

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Category --}}
                <div class="mb-4">
                    <label for="category_id" class="block font-medium text-sm text-gray-700">{{ __('Category') }}</label>
                    <select name="category_id" id="category_id" required class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Product Name --}}
                <div class="mb-4">
                    <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Product Name') }}</label>
                    <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500" required />
                </div>

                {{-- Price and Stock --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="price" class="block font-medium text-sm text-gray-700">{{ __('Price') }}</label>
                        <input id="price" name="price" type="number" step="0.01" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500" required />
                    </div>
                    <div>
                        <label for="stock" class="block font-medium text-sm text-gray-700">{{ __('Stock') }}</label>
                        <input id="stock" name="stock" type="number" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500" required />
                    </div>
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description') }}</label>
                    <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-rose-500 focus:border-rose-500"></textarea>
                </div>

                {{-- Image Upload --}}
                <div class="mb-6">
                    <label for="image" class="block font-medium text-sm text-gray-700">{{ __('Product Image (Optional)') }}</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-rose-500 focus:border-rose-500">
                </div>

                {{-- Buttons --}}
                <div class="flex justify-end">
                    <button type="button" x-on:click="$dispatch('close-modal', 'add-product-modal')" class="px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 transition duration-150 mr-3">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="px-4 py-2 bg-rose-600 text-white font-bold rounded-md hover:bg-rose-700 transition duration-150">
                        {{ __('Save Product') }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</x-app-layout>

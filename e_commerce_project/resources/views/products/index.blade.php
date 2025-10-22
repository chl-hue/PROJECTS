{{-- Note: $products and $categories are passed from the ProductController --}}
<x-app-layout active="products">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Product Inventory') }}
        </h2>
        <p class="text-sm text-gray-500">Manage all your products, inventory, and categories here.</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-full mx-auto px-6 lg:px-8">
            
            {{-- Success Message Alert --}}
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Product Categories ({{ $categories->count() }})</h3>
                <div class="flex flex-wrap gap-3">
                    
                    @forelse ($categories as $category)
                        <span class="px-4 py-2 bg-rose-50 text-rose-700 rounded-full text-sm font-medium border border-rose-200 shadow-sm transition duration-150 hover:bg-rose-100">
                            {{ $category->name }} ({{ $category->products_count }})
                        </span>
                    @empty
                        <p class="text-gray-500">No categories added yet. Click 'Add Category' to begin.</p>
                    @endforelse
                </div>
            </div>

            <div class="flex justify-end space-x-4 mb-6">
                <button 
                    x-on:click.prevent="$dispatch('open-add-category-modal')" 
                    class="flex items-center px-4 py-2 bg-pink-500 text-white font-medium rounded-lg hover:bg-pink-600 transition duration-150 shadow-md shadow-pink-200/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2H7a2 2 0 00-2 2v2m7-9v4"></path></svg>
                    {{ __('Add Category') }}
                </button>
                
                <button 
                    x-on:click.prevent="$dispatch('open-add-product-modal')" 
                    class="flex items-center px-4 py-2 bg-rose-600 text-white font-bold rounded-lg hover:bg-rose-700 transition duration-150 shadow-xl shadow-rose-300/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    {{ __('Add New Product') }}
                </button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Current Products List</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                        {{-- Tiyakin na nag-e-exist ang Category relationship --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->category->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($product->price, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm {{ $product->stock_quantity < 20 ? 'text-red-600 font-semibold' : 'text-green-600' }}">
                                            {{ $product->stock_quantity }} in stock
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-rose-600 hover:text-rose-900">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No products found. Add a new product to see it appear here.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    {{-- MODAL INCLUDES --}}
    @include('modals.add-category-modal')
    @include('modals.add-product-modal')

</x-app-layout>
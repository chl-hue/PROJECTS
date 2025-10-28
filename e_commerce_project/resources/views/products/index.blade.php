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
                <a href="{{ route('products.create') }}"
                   class="flex items-center px-4 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition duration-150 shadow-lg shadow-rose-200/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('Add New Product') }}
                </a>
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
                                            <a href="{{ route('products.edit', $product->id) }}" class="text-rose-600 hover:text-rose-900 font-semibold mr-2">Edit</a>

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
</x-app-layout>

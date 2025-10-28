<x-app-layout active="products">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
        <p class="text-sm text-gray-500">Update the product information below.</p>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto">
        {{-- Success / Error Messages --}}
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-4">
            @csrf
            @method('PUT')

            {{-- Category --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id" required 
                        class="mt-1 block w-full border-gray-300 rounded-md p-2 focus:ring-rose-500 focus:border-rose-500">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Product Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md p-2 focus:ring-rose-500 focus:border-rose-500">
            </div>

            {{-- Price & Stock --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required
                           class="mt-1 block w-full border-gray-300 rounded-md p-2 focus:ring-rose-500 focus:border-rose-500">
                </div>
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock) }}" required
                           class="mt-1 block w-full border-gray-300 rounded-md p-2 focus:ring-rose-500 focus:border-rose-500">
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="mt-1 block w-full border-gray-300 rounded-md p-2 focus:ring-rose-500 focus:border-rose-500">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Current Image --}}
            @if ($product->image)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Current Image</label>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-32 h-32 object-cover rounded mt-1">
                </div>
            @endif

            {{-- Image Upload --}}
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Change Image (Optional)</label>
                <input type="file" name="image" id="image" 
                       class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-rose-500 focus:border-rose-500">
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-rose-600 text-white rounded hover:bg-rose-700">Update Product</button>
            </div>
        </form>
    </div>
</x-app-layout>

<x-app-layout active="categories">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
        <p class="text-sm text-gray-500">Update the category details below.</p>
    </x-slot>

    <div class="py-8 max-w-lg mx-auto">
        {{-- Success / Error Messages --}}
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            {{-- Category Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" 
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-rose-500 focus:border-rose-500" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-rose-500 focus:border-rose-500">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-rose-600 text-white rounded hover:bg-rose-700">Update Category</button>
            </div>
        </form>
    </div>
</x-app-layout>

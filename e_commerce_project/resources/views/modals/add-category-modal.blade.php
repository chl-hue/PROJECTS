<x-modal name="add-category-modal" maxWidth="md">
    <div class="p-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ __('Add New Category') }}</h3>

        <form method="POST" action="{{ route('categories.store') }}"> 
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Category Name') }}</label>
                <input id="name" name="name" type="text" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-rose-500 focus:ring-rose-500" 
                       required autofocus value="{{ old('name') }}" />
                
                {{-- DISPLAY ERROR --}}
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description (Optional)') }}</label>
                <textarea id="description" name="description" rows="3" 
                          class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-rose-500 focus:ring-rose-500">{{ old('description') }}</textarea>
                
                {{-- DISPLAY ERROR --}}
                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end">
                <button type="button" x-on:click="$dispatch('close-modal')" class="px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 transition duration-150 mr-3">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" class="px-4 py-2 bg-rose-600 text-white font-bold rounded-md hover:bg-rose-700 transition duration-150">
                    {{ __('Save Category') }}
                </button>
            </div>
        </form>
    </div>
</x-modal>
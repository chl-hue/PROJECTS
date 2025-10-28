<x-app-layout active="categories">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Category Management') }}
        </h2>
        <p class="text-sm text-gray-500">Manage all product categories here.</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-full mx-auto px-6 lg:px-8">

            {{-- ✅ Success Alert --}}
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            {{-- 🧭 Header --}}
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">
                    Categories ({{ $categories->count() }})
                </h3>

                <!-- Add Category Button -->
                <button 
                    x-data
                    x-on:click="$dispatch('open-add-category')"
                    class="flex items-center px-4 py-2 bg-rose-600 text-white font-semibold rounded-lg hover:bg-rose-700 transition duration-150 shadow-lg shadow-rose-200/50"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('Add New Category') }}
                </button>
            </div>

            {{-- 📋 Categories Table --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                                    <th class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->description ?? '—' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->products_count ?? 0 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                                            {{-- Edit --}}
                                            <button 
                                                x-on:click="$dispatch('open-edit-category-modal', { id: {{ $category->id }}, name: '{{ $category->name }}', description: '{{ $category->description ?? '' }}' })"
                                                class="text-rose-600 hover:text-rose-900 font-semibold">
                                                Edit
                                            </button>

                                            {{-- Delete --}}
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                                    class="text-gray-500 hover:text-gray-700 font-semibold">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            No categories found. Add a new category to begin.
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

    {{-- 🟢 Add Category Modal --}}
    <div 
        x-data="{ open: false }"
        x-on:open-add-category.window="open = true"
        x-show="open"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        style="display: none;"
    >
        <div 
            class="bg-white p-6 rounded shadow-lg w-96 relative"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            @click.away="open = false"
        >
            <h2 class="text-xl font-semibold mb-4">Add New Category</h2>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="Enter category name" 
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-rose-500" 
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea 
                        name="description" 
                        placeholder="Enter description" 
                        class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-rose-500"
                    ></textarea>
                </div>

                <div class="flex justify-end space-x-2">
                    <button 
                        type="button" 
                        x-on:click="open = false" 
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-rose-600 text-white rounded hover:bg-rose-700 transition"
                    >
                        Save
                    </button>
                </div>
            </form>

            <!-- Close button -->
            <button 
                type="button" 
                x-on:click="open = false" 
                class="absolute top-2 right-2 text-gray-500 text-2xl font-bold"
            >
                &times;
            </button>
        </div>
    </div>

</x-app-layout>

{{-- Alpine.js --}}
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

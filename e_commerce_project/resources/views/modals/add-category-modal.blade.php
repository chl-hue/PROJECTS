<!-- resources/views/modals/add-category-modal.blade.php -->
<div 
    x-data="{ open: false }"
    x-on:open-modal.window="if($event.detail === 'add-category-modal') open = true"
    x-show="open"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    style="display: none;"
>
    <div 
        class="bg-white p-6 rounded shadow-lg w-96 relative"
        x-transition
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

        <!-- Close button (optional) -->
        <button 
            type="button" 
            x-on:click="open = false" 
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
        >
            &times;
        </button>
    </div>
</div>

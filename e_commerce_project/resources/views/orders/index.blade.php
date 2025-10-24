<x-app-layout active="orders"> {{-- New active state 'orders' for sidebar highlight --}}
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Order Management') }}
        </h2>
        <p class="text-sm text-gray-500">View and manage all customer orders and their status.</p>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Current Orders List</h3>
                    
                    {{-- Order Filters/Actions Area --}}
                    <div class="mb-4 flex justify-between items-center border-b pb-4">
                        <div class="text-gray-500">
                            {{-- Placeholder for a Search/Filter component --}}
                            Search, Filter by Status, or Date Range controls will go here.
                        </div>
                        <a href="#" class="px-4 py-2 bg-rose-600 text-white font-medium rounded-lg hover:bg-rose-700 transition duration-300 shadow-md">
                            Download Orders Report
                        </a>
                    </div>
                    
                    {{-- Orders Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {{-- Loop through orders here when data is available --}}
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">No orders found. Add a new order to see it appear here (or connect to an Order model).</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
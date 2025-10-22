{{-- Pass active state for Sidebar highlight --}}
<x-app-layout active="overview">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Welcome Back, Admin!') }}
        </h2>
        <p class="text-sm text-gray-500">Dashboard Overview for GlamourGlow</p>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto px-6 lg:px-8">
            
            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-2 border-rose-100">
                    <p class="text-sm font-medium text-gray-500">Total Sales</p>
                    <p class="text-4xl font-extrabold text-gray-900 mt-2">$--</p>
                    <p class="text-sm text-gray-400 mt-1">Data loading...</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg border-t-2 border-rose-100">
                    <p class="text-sm font-medium text-gray-500">New Orders</p>
                    <p class="text-4xl font-extrabold text-gray-900 mt-2">--</p>
                    <p class="text-sm text-gray-400 mt-1">Data loading...</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-2 border-rose-100">
                    <p class="text-sm font-medium text-gray-500">Low Stock Items</p>
                    <p class="text-4xl font-extrabold text-gray-900 mt-2">--</p>
                    <p class="text-sm text-gray-400 mt-1">Data loading...</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg border-t-2 border-rose-100">
                    <p class="text-sm font-medium text-gray-500">New Customers</p>
                    <p class="text-4xl font-extrabold text-gray-900 mt-2">--</p>
                    <p class="text-sm text-gray-400 mt-1">Data loading...</p>
                </div>
            </div>

            {{-- Recent Orders Table --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Recent Orders</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ORDER ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CUSTOMER</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PRODUCT</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">STATUS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No recent orders to display.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
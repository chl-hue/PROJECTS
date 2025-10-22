{{-- File: resources/views/reports/index.blade.php --}}

<x-app-layout active="reports">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('Sales & Inventory Reports') }}
        </h2>
        <p class="text-sm text-gray-500">Generate and view all essential business reports.</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-full mx-auto px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Report Generation</h3>
                
                {{-- Placeholder area for future reports --}}
                <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                    <p class="text-gray-600">This area will contain options to select report type (e.g., Sales by Month, Low Stock) and date range.</p>
                </div>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Generated Reports</h3>
                    <p class="text-gray-500">No reports have been generated yet.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
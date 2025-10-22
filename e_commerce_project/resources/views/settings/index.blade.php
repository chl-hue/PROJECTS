{{-- File: resources/views/settings/index.blade.php --}}

<x-app-layout active="settings">
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight">
            {{ __('System Settings') }}
        </h2>
        <p class="text-sm text-gray-500">Configure application preferences and user access.</p>
    </x-slot>

    <div class="py-8">
        <div class="max-w-full mx-auto px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Account and System Configuration</h3>
                
                {{-- Placeholder content --}}
                <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                    <p class="text-gray-600">This area is reserved for managing user accounts, appearance, and other system settings.</p>
                </div>
                
                <p class="text-gray-500 mt-4">The Settings page is now accessible.</p>
            </div>
        </div>
    </div>
</x-app-layout>
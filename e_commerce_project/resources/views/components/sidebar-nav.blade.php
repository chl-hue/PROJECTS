@props(['active'])

<div class="flex flex-col h-full bg-white border-r border-gray-200">
    <div class="shrink-0 flex items-center p-6 border-b border-gray-100">
        <a href="{{ route('dashboard') }}" class="text-3xl font-extrabold text-rose-600 tracking-tight">
            GlamourGlow
        </a>
    </div>

    <div class="flex-grow p-4 space-y-2">
        
        {{-- Overview Link --}}
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Overview') }}
        </x-sidebar-link>

        {{-- Products Link --}}
        <x-sidebar-link :href="route('products.index')" :active="request()->routeIs('products.index')">
            {{ __('Products') }}
        </x-sidebar-link>
        
        {{-- Customers Link --}}
        <x-sidebar-link :href="route('customers.index')" :active="request()->routeIs('customers.index')">
            {{ __('Customers') }}
        </x-sidebar-link>
        
        {{-- Reports Link --}}
        <x-sidebar-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
            {{ __('Reports') }}
        </x-sidebar-link>
        
        {{-- Settings Link --}}
        <x-sidebar-link :href="route('settings.index')" :active="request()->routeIs('settings.index')">
            {{ __('Settings') }}
        </x-sidebar-link>

    </div>

    <div class="p-6 border-t border-gray-100">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition duration-150">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</div>
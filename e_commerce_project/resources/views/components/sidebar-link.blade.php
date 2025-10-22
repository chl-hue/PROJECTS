@props(['active'])

@php

$classes = ($active ?? false)
            ? 'bg-rose-500 text-white shadow-md hover:bg-rose-600'
            : 'text-gray-700 hover:bg-rose-50 hover:text-rose-600';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' block w-full text-left px-4 py-3 font-medium rounded-lg transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</a>
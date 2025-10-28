<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GlamourGlow') }}</title>

        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        
        {{-- UPDATED: Flex container for Sidebar and Content --}}
        <div class="min-h-screen bg-gray-50 flex">
            
            <div class="w-64 flex-shrink-0">
                {{-- Pass active to highlight the correct link --}}
                <x-sidebar-nav :active="$active ?? ''" />
            </div>

            <div class="flex-grow flex flex-col">
                @isset($header)
                    <header class="bg-white shadow border-b border-gray-200">
                        <div class="max-w-full mx-auto py-6 px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main class="flex-grow">
                    {{ $slot }}
                </main>
            </div>
        </div>
        
    </body>
</html>

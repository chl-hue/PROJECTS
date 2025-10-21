<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlamourGlow | Beauty in Every Shade</title>
    
    <!-- Load Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Inter Font for a modern look -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom shadows for a premium feel */
        .shadow-custom {
            box-shadow: 0 10px 15px -3px rgba(244, 114, 182, 0.2), 0 4px 6px -2px rgba(244, 114, 182, 0.1);
        }
    </style>

</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Navbar - Fixed at the top, clean white background with rose accent -->
    <nav class="bg-white border-b border-rose-100 shadow-sm py-4 px-6 md:px-12 flex justify-between items-center sticky top-0 z-10">
        <div class="text-3xl font-extrabold text-rose-600 tracking-tight">GlamourGlow</div>
        <div class="space-x-2 flex items-center">
            <!-- Corrected Login Link to original Laravel Blade format -->
            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 rounded-full hover:bg-rose-50 transition duration-300 text-sm font-medium">Login</a>
            <!-- Corrected Register Link to original Laravel Blade format -->
            <a href="{{ route('register') }}" class="px-4 py-2 bg-rose-600 text-white font-semibold rounded-full shadow-lg hover:bg-rose-700 transition duration-300 text-sm">Register</a>
        </div>
    </nav>

    <!-- Hero Section - Soft rose background, bold typography, and impactful call to action -->
    <section class="text-center py-24 bg-rose-50 border-b border-rose-100">
        <h1 class="text-6xl font-black text-gray-900 mb-4 tracking-tight">Beauty in Every Shade</h1>
        <p class="text-rose-700 text-xl mb-10 max-w-xl mx-auto">Discover our exclusive, cruelty-free makeup collection designed to enhance your natural radiance.</p>
        <a href="#products" class="px-10 py-4 bg-rose-600 text-white font-bold text-lg rounded-full shadow-2xl shadow-rose-400/50 transform hover:scale-[1.03] transition duration-300 ease-in-out">Shop Now</a>
    </section>

    <!-- Featured Products - Enhanced card design with deeper shadows and hover effects -->
    <section id="products" class="py-20 px-4 md:px-12 lg:px-20">
        <h2 class="text-4xl font-bold text-gray-800 mb-12 text-center">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            
            <!-- Product Card: Ruby Lipstick (Icon Added) -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-custom transform hover:-translate-y-1 transition duration-300">
                <!-- Icon Container: Replaces image -->
                <div class="w-full aspect-square bg-rose-100 flex items-center justify-center transition duration-500 group-hover:opacity-90 p-8">
                    <!-- Lipstick SVG Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-28 h-28 text-rose-600">
                        <path d="M12 16.5V21" />
                        <path d="M16 16.5H8" />
                        <path d="M12 16.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        <path d="M17 11.5V6a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v5.5" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">Ruby Lipstick</h3>
                    <p class="text-rose-600 text-2xl font-extrabold mb-4">$19.99</p>
                    <a href="#" class="block text-center bg-rose-500 text-white py-3 font-medium rounded-xl hover:bg-rose-600 transition duration-300">Add to Bag</a>
                </div>
            </div>

            <!-- Product Card: Rosy Blush (Icon Added) -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-custom transform hover:-translate-y-1 transition duration-300">
                <!-- Icon Container: Replaces image -->
                <div class="w-full aspect-square bg-rose-100 flex items-center justify-center transition duration-500 group-hover:opacity-90 p-8">
                    <!-- Blush SVG Icon (Compact and Brush) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-28 h-28 text-rose-600">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 12h.01" />
                        <path d="M8.5 8.5l7 7" />
                        <path d="M16 12a4 4 0 0 1-4 4" />
                        <path d="m17 21-2.5-2.5" />
                        <path d="M12.5 7.5L7 13" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">Rosy Blush</h3>
                    <p class="text-rose-600 text-2xl font-extrabold mb-4">$14.99</p>
                    <a href="#" class="block text-center bg-rose-500 text-white py-3 font-medium rounded-xl hover:bg-rose-600 transition duration-300">Add to Bag</a>
                </div>
            </div>

            <!-- Product Card: Smooth Foundation (Icon Added) -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-custom transform hover:-translate-y-1 transition duration-300">
                <!-- Icon Container: Replaces image -->
                <div class="w-full aspect-square bg-rose-100 flex items-center justify-center transition duration-500 group-hover:opacity-90 p-8">
                    <!-- Foundation SVG Icon (Dropper Bottle) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-28 h-28 text-rose-600">
                        <path d="M14 3v4a3 3 0 0 0 3 3h4" />
                        <path d="M17 21v-7a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v7" />
                        <path d="M6 14h11" />
                        <path d="M14 3a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2" />
                        <path d="M12 21v-3" />
                        <path d="M12 18h1" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">Smooth Foundation</h3>
                    <p class="text-rose-600 text-2xl font-extrabold mb-4">$24.99</p>
                    <a href="#" class="block text-center bg-rose-500 text-white py-3 font-medium rounded-xl hover:bg-rose-600 transition duration-300">Add to Bag</a>
                </div>
            </div>

            <!-- Product Card: Glam Eyeshadow (Icon Added) -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden group hover:shadow-custom transform hover:-translate-y-1 transition duration-300">
                <!-- Icon Container: Replaces image -->
                <div class="w-full aspect-square bg-rose-100 flex items-center justify-center transition duration-500 group-hover:opacity-90 p-8">
                    <!-- Eyeshadow SVG Icon (Palette) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-28 h-28 text-rose-600">
                        <path d="M21 3H3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z" />
                        <path d="M12 3v18" />
                        <path d="M3 12h18" />
                        <path d="M8 8h1" />
                        <path d="M15 15h1" />
                        <path d="M8 15h1" />
                        <path d="M15 8h1" />
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">Glam Eyeshadow</h3>
                    <p class="text-rose-600 text-2xl font-extrabold mb-4">$22.99</p>
                    <a href="#" class="block text-center bg-rose-500 text-white py-3 font-medium rounded-xl hover:bg-rose-600 transition duration-300">Add to Bag</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer - Clean and subtle matching background -->
    <footer class="bg-rose-50 py-8 mt-16 text-center text-gray-600 border-t border-rose-100">
        <p>&copy; 2024 GlamourGlow. All rights reserved.</p>
    </footer>

</body>
</html>

@if (session('success') || session('error') || session('warning'))
<div class="fixed top-20 right-8 z-50 w-full max-w-md">
    
    @php
        $type = session('success') ? 'success' : (session('error') ? 'error' : 'warning');
        $message = session($type);
        
        $styles = [
            'success' => 'bg-green-50 border-green-200 text-green-700',
            'error'   => 'bg-red-50 border-red-200 text-red-700',
            'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-700',
        ];
        
        $icons = [
            'success' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            'error'   => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            'warning' => '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>',
        ];
    @endphp
    
    <div class="p-4 rounded-xl border-l-4 {{ $styles[$type] }} shadow-lg transition duration-500 ease-in-out transform hover:scale-[1.01]" 
         x-data="{ show: true }" 
         x-init="setTimeout(() => { show = false }, 5000)" 
         x-show="show" 
         x-transition:enter="ease-out duration-300" 
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
         x-transition:leave="ease-in duration-200" 
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        
        <div class="flex items-center">
            {!! $icons[$type] !!}
            <p class="text-sm font-medium leading-5">
                {{ $message }}
            </p>
        </div>
        
    </div>
</div>
@endif
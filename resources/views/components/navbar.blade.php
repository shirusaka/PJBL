<header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-30 px-6 flex items-center justify-between">
    
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 -ml-2 text-slate-500 hover:bg-gray-100 rounded-lg transition">
            <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h7M4 18h7"></path></svg>
        </button>

        <div class="hidden sm:flex items-center text-sm text-slate-500">
            <span>Admin</span>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="font-semibold text-primary-600">@yield('page_title', 'Dashboard')</span>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <div class="flex items-center gap-3 pl-4 border-l border-gray-100">
            <div class="text-right hidden md:block">
                <p class="text-sm font-bold text-slate-700">{{ Auth::user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-slate-400">Administrator</p>
            </div>
            
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-orange-300 p-0.5 shadow-md cursor-pointer hover:scale-105 transition-transform">
                <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-primary-500">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</header>
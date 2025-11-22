<aside class="fixed top-0 left-0 z-50 h-screen bg-white border-r border-gray-100 shadow-xl transition-all duration-300 ease-in-out overflow-hidden whitespace-nowrap"
       :class="sidebarOpen ? 'w-64 translate-x-0' : 'w-0 -translate-x-full lg:w-0 lg:translate-x-0'">
    
    <div class="mt-5 h-20 flex items-center justify-center border-b border-gray-50 min-w-[16rem]">
        <a href="#" class="block">
            <img src="{{ asset('storage/images/logo_ayam_kabogor.png') }}" 
                 alt="Ayam Kabogor" 
                 class="h-20 w-auto object-contain"
                 onerror="this.src='https://placehold.co/200x80?text=LOGO';"> 
        </a>
    </div>

    <nav class="p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" 
           class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none {{ Request::routeIs('admin.dashboard') ? 'bg-primary-50 text-primary-600 shadow-sm translate-x-1' : 'text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1' }}">
            
            @if(Request::routeIs('admin.dashboard'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>
            @endif

            <svg class="w-5 h-5 shrink-0 transition-colors duration-300 {{ Request::routeIs('admin.dashboard') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500' }}" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span>Dashboard Menu</span>
        </a>

        <a href="{{ route('admin.testimoni.index') }}" 
           class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none {{ Request::routeIs('admin.testimoni.*') ? 'bg-primary-50 text-primary-600 shadow-sm translate-x-1' : 'text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1' }}">
            
            @if(Request::routeIs('admin.testimoni.*'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>
            @endif

            <svg class="w-5 h-5 shrink-0 transition-colors duration-300 {{ Request::routeIs('admin.testimoni.*') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500' }}" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
            </svg>
            <span>Testimoni</span>
        </a>

        <a href="{{ route('admin.faq.index') }}" 
           class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none {{ Request::routeIs('admin.faq.*') ? 'bg-primary-50 text-primary-600 shadow-sm translate-x-1' : 'text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1' }}">
            
            @if(Request::routeIs('admin.faq.*'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>
            @endif

            <svg class="w-5 h-5 shrink-0 transition-colors duration-300 {{ Request::routeIs('admin.faq.*') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500' }}" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>FAQ</span>
        </a>
    </nav>

    <div class="absolute bottom-0 left-0 w-full p-4 bg-white border-t border-gray-100 min-w-[16rem]">
        <form action="{{ url('/logout') }}" method="GET"> @csrf
            <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-slate-500 hover:text-red-500 transition-colors rounded-lg hover:bg-red-50">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="font-medium text-sm">Logout</span>
            </button>
        </form>
    </div>
</aside>
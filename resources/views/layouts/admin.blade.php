<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Ayam Kabogor</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        primary: {
                            50: '#fff7ed', 100: '#ffedd5', 500: '#f97316', 600: '#ea580c', 700: '#c2410c',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        html { scroll-behavior: smooth; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display: none !important; }
        
        /* Animasi Fade In Up */
        .fade-in-up { animation: fadeInUp 0.5s ease-out forwards; opacity: 0; transform: translateY(10px); }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
    </style>
</head>

<body class="bg-gray-50 text-slate-800 font-sans antialiased" 
      x-data="{ sidebarOpen: window.innerWidth >= 1024 }">

    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden backdrop-blur-sm"></div>

    <aside class="fixed top-0 left-0 z-50 h-screen bg-white border-r border-gray-100 shadow-xl transition-all duration-300 ease-in-out overflow-hidden whitespace-nowrap"
           :class="sidebarOpen ? 'w-64 translate-x-0' : 'w-0 -translate-x-full lg:w-0 lg:translate-x-0'">
        
        <div class="mt-5 h-20 flex items-center justify-center border-b border-gray-50 min-w-[16rem]">
            <a href="{{ route('admin.dashboard') }}" class="block">
                <img src="{{ asset('assets/img/logo_ayam.png') }}" 
                     alt="Ayam Kabogor" 
                     class="h-20 w-auto object-contain"
                     onerror="this.src='https://placehold.co/200x80?text=AYAM+KABOGOR';"> 
            </a>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" 
               class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none {{ request()->routeIs('admin.dashboard') ? 'bg-primary-50 text-primary-600 shadow-sm translate-x-1' : 'text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1' }}">
                @if(request()->routeIs('admin.dashboard'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>
                @endif
                <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span>Daftar Menu</span>
            </a>

            <a href="{{ route('admin.testimoni.index') }}" 
               class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none {{ request()->routeIs('admin.testimoni.index') ? 'bg-primary-50 text-primary-600 shadow-sm translate-x-1' : 'text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1' }}">
                @if(request()->routeIs('admin.testimoni.index'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>
                @endif
                <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.testimoni.index') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                </svg>
                <span>Testimoni</span>
            </a>

            <a href="{{ route('admin.faq.index') }}" 
               class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none {{ request()->routeIs('admin.faq.index') ? 'bg-primary-50 text-primary-600 shadow-sm translate-x-1' : 'text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1' }}">
                @if(request()->routeIs('admin.faq.index'))
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>
                @endif
                <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.faq.index') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>FAQ</span>
            </a>
        </nav>

        <div class="absolute bottom-0 left-0 w-full p-4 bg-white border-t border-gray-100 min-w-[16rem]">
            <a href="{{ url('/logout') }}" class="flex items-center gap-3 w-full px-4 py-2 text-slate-500 hover:text-red-500 transition-colors rounded-lg hover:bg-red-50">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="font-medium text-sm">Logout</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-h-screen transition-all duration-300 ease-in-out"
         :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-0'">
        
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

            <div x-data="{ 
                showProfileModal: false,
                adminData: {
                    name: '{{ Auth::user()->name ?? 'Admin' }}',
                    username: '{{ Auth::user()->email ?? 'admin01' }}',
                    role: 'Administrator',
                    email: '{{ Auth::user()->email ?? 'admin@ayamkabogor.com' }}',
                    phone: '+62 812 3456 7890',
                    address: 'Bogor, Indonesia'
                },
                get initials() {
                    return this.adminData.name.charAt(0).toUpperCase();
                }
            }" class="relative z-50">

                <button type="button" 
                        @click="showProfileModal = true" 
                        class="flex items-center gap-4 cursor-pointer group focus:outline-none text-left">
                    
                    <div class="flex items-center gap-3 pl-4 border-l border-gray-100">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-slate-700 group-hover:text-orange-600 transition-colors" x-text="adminData.name"></p>
                            <p class="text-xs text-slate-400" x-text="adminData.role"></p>
                        </div>
                        
                        <div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold shadow-sm group-hover:bg-orange-600 group-hover:text-white transition-all duration-300">
                            <span x-text="initials"></span>
                        </div>
                    </div>
                </button>

                <template x-teleport="body">
                    <div x-show="showProfileModal" 
                        style="display: none;"
                        class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/50 backdrop-blur-sm p-4"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">

                        <div @click.away="showProfileModal = false"
                            class="bg-white w-full max-w-sm rounded-3xl shadow-2xl overflow-hidden relative flex flex-col"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 translate-y-4">

                            <div class="bg-gradient-to-br from-orange-600 to-orange-400 p-6 relative overflow-hidden">
                                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                                <div class="absolute bottom-0 left-0 w-full h-12 bg-gradient-to-t from-black/10 to-transparent"></div>

                                <div class="relative z-10 flex justify-between items-start">
                                    <div>
                                        <p class="text-orange-100 text-xs font-medium uppercase tracking-wider mb-1">Account Info</p>
                                        <h3 class="text-2xl font-bold text-white" x-text="adminData.name"></h3>
                                        <div class="inline-flex items-center gap-1 mt-2 bg-white/20 backdrop-blur-md border border-white/20 px-3 py-1 rounded-lg">
                                            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                                            <span class="text-xs text-white font-medium" x-text="adminData.role"></span>
                                        </div>
                                    </div>
                                    
                                    <button @click="showProfileModal = false" class="bg-white/20 hover:bg-white/40 text-white p-2 rounded-full backdrop-blur-md transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </div>
                            </div>

                            <div class="p-6 bg-white">
                                <div class="space-y-5 mb-8">
                                    <div class="flex items-center justify-between p-4 bg-orange-50 rounded-2xl border border-orange-100">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-white text-orange-500 flex items-center justify-center shadow-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400">Username</p>
                                                <p class="text-sm font-bold text-slate-800" x-text="adminData.username"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-4 pl-1">
                                        <div class="flex items-start gap-4">
                                            <div class="mt-0.5 text-slate-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div class="flex-1 border-b border-slate-100 pb-3">
                                                <p class="text-xs text-slate-400 font-medium">Email</p>
                                                <p class="text-sm text-slate-700 mt-0.5 font-medium" x-text="adminData.email"></p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-4">
                                            <div class="mt-0.5 text-slate-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                            </div>
                                            <div class="flex-1 border-b border-slate-100 pb-3">
                                                <p class="text-xs text-slate-400 font-medium">Phone</p>
                                                <p class="text-sm text-slate-700 mt-0.5 font-medium" x-text="adminData.phone"></p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-4">
                                            <div class="mt-0.5 text-slate-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-xs text-slate-400 font-medium">Location</p>
                                                <p class="text-sm text-slate-700 mt-0.5 font-medium" x-text="adminData.address"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

        </header>

        <main class="flex-1 p-6 lg:p-8">
            @yield('content')

            <footer class="mt-10 text-center text-sm text-slate-400 pb-4">
                &copy; 2025 Ayam Kabogor. All rights reserved.
            </footer>
        </main>

    </div>

    @stack('scripts')

</body>
</html>
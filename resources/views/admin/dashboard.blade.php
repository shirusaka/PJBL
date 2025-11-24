<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ayam Kabogor</title>

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

    @if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" 
         class="fixed top-5 right-5 z-[100] bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 fade-in-up">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
    @endif

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
               class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none bg-primary-50 text-primary-600 shadow-sm translate-x-1">
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>
                <svg class="w-5 h-5 shrink-0 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span>Daftar Menu</span>
            </a>

            <a href="{{ route('admin.testimoni.index') }}" 
               class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1">
                <svg class="w-5 h-5 shrink-0 text-slate-400 group-hover:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                </svg>
                <span>Testimoni</span>
            </a>

            <a href="{{ route('admin.faq.index') }}" 
               class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1">
                <svg class="w-5 h-5 shrink-0 text-slate-400 group-hover:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <span class="font-semibold text-primary-600">Daftar Menu</span>
                </div>
            </div>

            <div x-data="{ 
                showProfileModal: false,
                adminData: {
                    name: '{{ Auth::user()->name ?? 'Admin' }}',
                    username: '{{ Auth::user()->email ?? 'admin01' }}',
                    role: 'Administrator',
                    email: '{{ Auth::user()->email ?? 'admin@ayamkabogor.com' }}',
                    phone: '+62 811 8509 743',
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
            
            <div x-data="menuManager()">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Menu</h1>
                        <p class="text-slate-500 mt-1">Kelola semua menu makanan katering Anda di sini.</p>
                    </div>
                    
                    <button @click="openModal('add')" 
                            class="group relative inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-orange-200 hover:bg-primary-700 hover:-translate-y-0.5 transition-all duration-300 focus:ring-4 focus:ring-primary-100 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Tambah Menu Baru
                    </button>
                </div>

                <div x-show="showModal" 
                     x-transition.opacity
                     class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4"
                     style="display: none;"> 
                    <div @click.away="showModal = false"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl overflow-hidden border border-white/20 max-h-[90vh] flex flex-col">

                        <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                            <div>
                                <h2 class="text-xl font-bold text-slate-800" x-text="modalMode === 'edit' ? 'Edit Menu' : 'Tambah Menu Baru'"></h2>
                                <p class="text-sm text-slate-500">Isi detail menu katering di bawah ini.</p>
                            </div>
                            <button @click="showModal = false" class="p-2 rounded-full hover:bg-red-50 text-slate-400 hover:text-red-500 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>

                        <div class="p-8 overflow-y-auto custom-scrollbar">
                            <form :action="formAction" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" :value="modalMode === 'edit' ? 'PUT' : 'POST'">

                                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                                    
                                    <div class="lg:col-span-5 flex flex-col gap-4">
                                        <label class="block text-sm font-semibold text-slate-700">Foto Menu</label>
                                        
                                        <div @click="$refs.fileInput.click()" 
                                             class="relative w-full aspect-square rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-orange-50 hover:border-orange-300 transition-all cursor-pointer flex flex-col items-center justify-center group overflow-hidden">
                                            
                                            <input type="file" 
                                                   x-ref="fileInput"
                                                   name="gambar" 
                                                   class="hidden" 
                                                   accept="image/png, image/jpeg, image/jpg" 
                                                   @change="fileChosen" 
                                                   :required="modalMode === 'add'">
                                            
                                            <div x-show="!form.imagePreview" class="text-center p-6 flex flex-col items-center transition-opacity duration-300">
                                                <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-sm font-medium text-slate-700 group-hover:text-orange-600">Klik untuk upload gambar</p>
                                                <p class="text-xs text-slate-400 mt-1">PNG, JPG (Max 10MB)</p>
                                            </div>

                                            <img x-show="form.imagePreview" :src="form.imagePreview" class="absolute inset-0 w-full h-full object-cover" style="display: none;">
                                            
                                            <div x-show="form.imagePreview" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                <span class="bg-white/20 backdrop-blur text-white px-4 py-2 rounded-lg text-sm font-medium border border-white/50">Ganti Foto</span>
                                            </div>
                                        </div>
                                        
                                        @error('gambar')
                                            <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="lg:col-span-7 space-y-5">
                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Menu</label>
                                            <input x-model="form.nama_menu" type="text" name="nama_menu" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all" required placeholder="Contoh: Ayam Bakar">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                                            <textarea x-model="form.deskripsi" name="deskripsi" rows="3" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 resize-none" placeholder="Deskripsi menu..."></textarea>
                                        </div>

                                        <div class="grid grid-cols-2 gap-5 items-start">
                                            <div>
                                                <label class="block text-sm font-semibold text-slate-700 mb-2">Harga Asli</label>
                                                <div class="relative">
                                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-medium">Rp</span>
                                                    <input x-model.number="form.harga" type="number" name="harga" class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500/50 font-semibold text-slate-800" placeholder="0" required>
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <div class="flex items-center justify-between mb-2 h-6">
                                                    <label class="block text-sm font-semibold text-slate-700">Diskon?</label>
                                                    <label class="inline-flex items-center cursor-pointer">
                                                        <input type="checkbox" class="sr-only peer" x-model="form.hasPromo">
                                                        <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                                    </label>
                                                </div>

                                                <div x-show="form.hasPromo" x-transition>
                                                    <div class="flex rounded-xl border border-gray-200 overflow-hidden focus-within:ring-2 focus-within:ring-blue-500 bg-gray-50">
                                                        <input x-model.number="form.promo" 
                                                            :disabled="!form.hasPromo"
                                                            type="number" 
                                                            name="promo" 
                                                            min="0" 
                                                            max="100" 
                                                            class="w-full px-4 py-3 bg-transparent border-none focus:ring-0 focus:outline-none" 
                                                            placeholder="15">
                                                        <div class="bg-gray-200 px-4 flex items-center justify-center text-slate-600 font-bold border-l border-gray-200">
                                                            %
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-2 border-t border-gray-100 mt-2">
                                            <label class="block text-sm font-semibold text-slate-700 mb-3">Status Ketersediaan</label>
                                            <div class="flex items-center gap-4">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" name="is_inactive" x-model="form.isInactive" class="sr-only peer">
                                                    <div class="w-11 h-6 bg-green-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                                    <span class="ml-3 text-sm font-bold transition-colors"
                                                          :class="form.isInactive ? 'text-red-600' : 'text-green-600'"
                                                          x-text="form.isInactive ? 'Habis / Tidak Tersedia' : 'Tersedia'">
                                                    </span>
                                                </label>
                                            </div>
                                            <p class="text-xs text-slate-400 mt-2">Jika status "Habis", menu tidak akan dapat dipesan oleh pelanggan.</p>
                                        </div>

                                        <div x-show="form.hasPromo && form.harga > 0 && form.promo > 0" x-transition class="mt-2 p-4 bg-blue-50 border border-blue-100 rounded-xl space-y-2">
                                            <h4 class="text-xs font-bold text-blue-800 uppercase tracking-wider mb-2">Simulasi Harga</h4>
                                            <div class="flex justify-between text-sm text-slate-600">
                                                <span>Harga Awal:</span>
                                                <span x-text="'Rp ' + (form.harga || 0).toLocaleString('id-ID')"></span>
                                            </div>
                                            <div class="flex justify-between text-sm text-red-500">
                                                <span>Potongan (<span x-text="form.promo"></span>%):</span>
                                                <span x-text="'- Rp ' + Math.round(form.harga * (form.promo / 100)).toLocaleString('id-ID')"></span>
                                            </div>
                                            <div class="border-t border-blue-200 pt-2 mt-1 flex justify-between items-center">
                                                <span class="font-bold text-slate-800">Harga Akhir:</span>
                                                <span class="font-bold text-xl text-blue-700" 
                                                      x-text="'Rp ' + Math.round(form.harga - (form.harga * (form.promo / 100))).toLocaleString('id-ID')"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="px-8 py-6 mt-8 -mx-8 -mb-8 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                                    <button type="button" @click="showModal = false" class="px-6 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-gray-200 transition-colors">Batal</button>
                                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-primary-600 text-white font-bold shadow-lg hover:bg-primary-700 transition-all">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="relative group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-orange-500/10 hover:-translate-y-1 transition-all duration-300 cursor-default overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-orange-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative flex items-center gap-5">
                            <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-orange-50 flex items-center justify-center text-orange-500 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-500 mb-1">Total Menu</p>
                                <h3 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $menus->count() }} <span class="text-lg text-slate-400 font-normal">Item</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="relative group bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-blue-500/10 hover:-translate-y-1 transition-all duration-300 cursor-default overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative flex items-center gap-5">
                            <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-500 mb-1">Sedang Promo</p>
                                @php $totalPromo = $menus->where('promo', '>', 0)->count(); @endphp
                                <h3 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $totalPromo }} <span class="text-lg text-slate-400 font-normal">Item</span></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    
                    <div class="p-5 border-b border-gray-50 bg-gray-50/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="relative w-full sm:w-72">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input x-model="search" type="text" class="w-full py-2.5 pl-10 pr-4 text-sm text-slate-700 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition-all" placeholder="Cari menu...">
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-slate-500 font-semibold select-none">
                                    <th class="px-6 py-4 w-16 text-center">#</th>
                                    <th class="px-6 py-4 w-32">Gambar</th>
                                    <th class="px-6 py-4 cursor-pointer hover:bg-gray-100" @click="sortBy('nama_menu')">Detail Menu</th>
                                    <th class="px-6 py-4 w-40 cursor-pointer hover:bg-gray-100" @click="sortBy('harga')">Harga</th>
                                    <th class="px-6 py-4 w-24 text-center cursor-pointer hover:bg-gray-100" @click="sortBy('promo')">Promo</th>
                                    <th class="px-6 py-4 w-32 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <template x-for="(item, index) in paginatedData" :key="item.id">
                                    <tr class="hover:bg-gray-50/80 transition-colors group" :class="item.is_tersedia == 0 ? 'opacity-60 bg-gray-50' : ''">
                                        <td class="px-6 py-4 text-center text-slate-400 font-medium" x-text="(currentPage - 1) * itemsPerPage + index + 1"></td>
                                        <td class="px-6 py-4">
                                            <div class="relative w-24 h-24 rounded-xl overflow-hidden bg-gray-200 shadow-sm border border-gray-100">
                                                <img :src="'{{ asset('storage') }}/' + item.gambar" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/100'">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col gap-1">
                                                <span class="font-bold text-slate-800 text-base" x-text="item.nama_menu"></span>
                                                <p class="text-sm text-slate-500 line-clamp-2" x-text="item.deskripsi"></p>
                                                <span x-show="item.is_tersedia == 0" class="inline-block mt-1 text-xs text-red-500 font-bold border border-red-200 bg-red-50 px-2 py-0.5 rounded">Tidak Tersedia</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="font-bold text-slate-700 bg-slate-100 px-3 py-1 rounded-lg border border-slate-200" x-text="'Rp ' + parseInt(item.harga).toLocaleString('id-ID')"></span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border"
                                                :class="item.promo ? 'bg-green-100 text-green-700 border-green-200' : 'bg-gray-100 text-gray-500 border-gray-200'"
                                                x-text="item.promo ? item.promo + '%' : '-'">
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">
                                                <button @click="openModal('edit', item)" class="p-2 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                </button>
                                                
                                                <form :action="'{{ url('admin/menu') }}/' + item.id" method="POST" onsubmit="return confirm('Hapus menu ini?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="paginatedData.length === 0">
                                    <td colspan="6" class="p-8 text-center text-slate-500">Tidak ada data yang cocok.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-5 border-t border-gray-100 bg-white flex flex-col sm:flex-row items-center justify-between gap-4" x-show="filteredData.length > 0">
                        <p class="text-sm text-slate-500">Menampilkan <span class="font-bold text-slate-700" x-text="((currentPage - 1) * itemsPerPage) + 1"></span> - <span class="font-bold text-slate-700" x-text="Math.min(currentPage * itemsPerPage, filteredData.length)"></span> dari <span class="font-bold text-slate-700" x-text="filteredData.length"></span> Menu</p>
                        <div class="flex items-center gap-1">
                            <button @click="prevPage()" :disabled="currentPage === 1" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">Prev</button>
                            <button @click="nextPage()" :disabled="currentPage === totalPages" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="mt-10 text-center text-sm text-slate-400 pb-4">
                &copy; 2025 Ayam Kabogor. All rights reserved.
            </footer>

        </main>
    </div>

    <script>
        function menuManager() {
            return {
                search: '',
                sortCol: null,
                sortAsc: null,
                currentPage: 1,
                itemsPerPage: 5,
                showModal: false,
                modalMode: 'add',
                formAction: '',
                imgPreview: null,
                
                items: @json($menus),

                form: { 
                    id: null, 
                    nama_menu: '', 
                    deskripsi: '', 
                    harga: '', 
                    promo: '', 
                    hasPromo: false,
                    isInactive: false, 
                    imagePreview: null
                },

                openModal(mode, item = null) {
                    this.modalMode = mode;
                    this.showModal = true;
                    
                    // Reset file input
                    const fileInput = document.getElementById('fileInput');
                    if(fileInput) fileInput.value = '';

                    if (mode === 'edit' && item) {
                        this.form = {
                            id: item.id,
                            nama_menu: item.nama_menu,
                            deskripsi: item.deskripsi,
                            harga: item.harga, 
                            promo: item.promo,
                            hasPromo: item.promo > 0,
                            isInactive: item.is_tersedia == 0, 
                            imagePreview: item.gambar ? '{{ asset("storage") }}/' + item.gambar : null
                        };
                        this.formAction = '{{ url("admin/menu") }}/' + item.id;
                    } else {
                        // RESET FORM SAAT MODE ADD
                        this.form = { id: null, nama_menu: '', deskripsi: '', harga: '', promo: '', hasPromo: false, isInactive: false, imagePreview: null };
                        this.formAction = '{{ route("admin.menu.store") }}';
                    }
                },

                fileChosen(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                        if (!validTypes.includes(file.type)) {
                            alert('Format file tidak didukung! Harap upload gambar dengan format JPG atau PNG.');
                            event.target.value = ''; 
                            this.form.imagePreview = null;
                            return; 
                        }

                        if (file.size > 10 * 1024 * 1024) {
                            alert('Ukuran file terlalu besar! Maksimal 10MB.');
                            event.target.value = '';
                            this.form.imagePreview = null;
                            return;
                        }
                        
                        const reader = new FileReader();
                        reader.onload = (e) => { this.form.imagePreview = e.target.result; }
                        reader.readAsDataURL(file);
                    }
                },

                get filteredData() {
                    let data = this.items.filter(item => 
                        item.nama_menu.toLowerCase().includes(this.search.toLowerCase()) || 
                        (item.deskripsi && item.deskripsi.toLowerCase().includes(this.search.toLowerCase()))
                    );

                    if (this.sortCol) {
                        data = data.sort((a, b) => {
                            let valA = a[this.sortCol];
                            let valB = b[this.sortCol];
                            
                            if (typeof valA === 'string') { valA = valA.toLowerCase(); valB = valB.toLowerCase(); }
                            
                            if (valA < valB) return this.sortAsc ? -1 : 1;
                            if (valA > valB) return this.sortAsc ? 1 : -1;
                            return 0;
                        });
                    }
                    return data;
                },

                get paginatedData() {
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    return this.filteredData.slice(start, start + this.itemsPerPage);
                },

                get totalPages() { return Math.ceil(this.filteredData.length / this.itemsPerPage); },
                nextPage() { if (this.currentPage < this.totalPages) this.currentPage++; },
                prevPage() { if (this.currentPage > 1) this.currentPage--; },
                goToPage(page) { this.currentPage = page; },
                
                sortBy(col) {
                    if (this.sortCol === col) { this.sortAsc = !this.sortAsc; } 
                    else { this.sortCol = col; this.sortAsc = true; }
                }
            }
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ayam Kabogor</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Config -->
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
        /* Hide scrollbar for sidebar when collapsing */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .fade-in-up { animation: fadeInUp 0.5s ease-out forwards; opacity: 0; transform: translateY(10px); }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        [x-cloak] { display: none !important; }

        /* dari index.html */
        /* Custom Scrollbar agar lebih rapi */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; 
        }
        
        /* Animasi masuk untuk Modal */
        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
        }
        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: opacity 300ms, transform 300ms;
        }
        .modal-exit {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 200ms, transform 200ms;
        }
    </style>
</head>

<!-- 
    X-DATA GLOBAL: 
    sidebarOpen: true (default terbuka di desktop)
-->
<body class="bg-gray-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col" 
      x-data="{ sidebarOpen: window.innerWidth >= 1024 }">

    <!-- MOBILE OVERLAY (Hanya muncul di layar kecil saat sidebar buka) -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false" 
         x-transition.opacity
         class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden backdrop-blur-sm"></div>

    <!-- ================= SIDEBAR ================= -->
    <!-- Logic: Jika open w-64, jika close w-0 (di desktop) atau -translate-x (di mobile) -->
    <aside class="fixed top-0 left-0 z-50 h-screen bg-white border-r border-gray-100 shadow-xl transition-all duration-300 ease-in-out overflow-hidden whitespace-nowrap"
           :class="sidebarOpen ? 'w-64 translate-x-0' : 'w-0 -translate-x-full lg:w-0 lg:translate-x-0'">
        
        <div class="mt-5 h-20 flex items-center justify-center border-b border-gray-50 min-w-[16rem]">
            <a href="#" class="block">
                <img src="images/logo_ayam_kabogor.png" 
                     alt="Ayam Kabogor" 
                     class="h-20 w-auto object-contain"
                     onerror="this.src='https://placehold.co/200x80?text=LOGO';"> 
            </a>
        </div>

        <nav class="p-4 space-y-2" 
            x-data="{ 
                isActive(pageName) {
                    const path = window.location.pathname;
                    let currentFile = path.split('/').pop();
                    if (currentFile === '' || currentFile === '/') currentFile = 'index.html';
                    return currentFile === pageName;
                }
            }">

            <a href="index.html" 
            class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1"
            :class="{ 'bg-primary-50 text-primary-600 shadow-sm translate-x-1 hover:bg-primary-50 hover:text-primary-600': isActive('index.html') }">
                
                <span x-show="isActive('index.html')" x-cloak 
                    class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>

                <svg class="w-5 h-5 shrink-0 transition-colors duration-300" 
                    :class="isActive('index.html') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500'"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span>Daftar Menu</span>
            </a>

            <a href="testimoni.html" 
            class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1"
            :class="{ 'bg-primary-50 text-primary-600 shadow-sm translate-x-1 hover:bg-primary-50 hover:text-primary-600': isActive('testimoni.html') }">
                
                <span x-show="isActive('testimoni.html')" x-cloak 
                    class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>

                <svg class="w-5 h-5 shrink-0 transition-colors duration-300" 
                    :class="isActive('testimoni.html') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500'"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                </svg>
                <span>Testimoni</span>
            </a>

            <a href="faq.html" 
            class="relative flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium transition-all duration-300 group overflow-hidden focus:outline-none text-slate-500 hover:bg-gray-50 hover:text-slate-900 hover:translate-x-1"
            :class="{ 'bg-primary-50 text-primary-600 shadow-sm translate-x-1 hover:bg-primary-50 hover:text-primary-600': isActive('faq.html') }">
                
                <span x-show="isActive('faq.html')" x-cloak 
                    class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-primary-500 rounded-r-full"></span>

                <svg class="w-5 h-5 shrink-0 transition-colors duration-300" 
                    :class="isActive('faq.html') ? 'text-primary-600' : 'text-slate-400 group-hover:text-primary-500'"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>FAQ</span>
            </a>

        </nav>

        <div class="absolute bottom-0 left-0 w-full p-4 bg-white border-t border-gray-100 min-w-[16rem]">
            <button class="flex items-center gap-3 w-full px-4 py-2 text-slate-500 hover:text-red-500 transition-colors rounded-lg hover:bg-red-50">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="font-medium text-sm">Logout</span>
            </button>
        </div>
    </aside>

    <!-- ================= MAIN CONTENT WRAPPER ================= -->
    <!-- Logic: Margin kiri berubah sesuai state sidebarOpen -->
    <div class="flex-1 flex flex-col min-h-screen transition-all duration-300 ease-in-out"
         :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-0'">
        
        <!-- HEADER -->
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-30 px-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Tombol Toggle Sidebar (Desktop & Mobile) -->
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 -ml-2 text-slate-500 hover:bg-gray-100 rounded-lg transition">
                    <!-- Icon Hamburger (Ketika Sidebar Tutup) -->
                    <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <!-- Icon Close/Menu Open (Ketika Sidebar Buka) -->
                    <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h7M4 18h7"></path></svg>
                </button>

                <!-- Breadcrumb -->
                <div class="hidden sm:flex items-center text-sm text-slate-500">
                    <span>Admin</span>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="font-semibold text-primary-600">Testimoni</span>
                </div>
            </div>

            <!-- Modal Profil -->
            <div x-data="{ 
                showProfileModal: false,
                adminData: {
                    name: 'Zahran',
                    username: 'admin01',
                    role: 'Administrator',
                    email: 'zahran@gmail.com',
                    phone: '+62 811 8509 743',
                    address: 'Aeon Tanjung Barat'
                },
                // Helper untuk mengambil inisial nama (Misal: Zahran -> Z)
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

        <!-- BODY KONTEN -->
        <main class="flex-1 p-6 lg:p-8">
            
            <div x-data="{
                showModal: false, 
                imgPreview: null,
                triggerUpload() { document.getElementById('fileInput').click() },
                fileChosen(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => { this.imgPreview = e.target.result; }
                        reader.readAsDataURL(file);
                    }
                }
            }">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Testimoni</h1>
                        <p class="text-slate-500 mt-1">Kelola semua testimoni di sini.</p>
                    </div>
                    
                    <button @click="showModal = true" 
                            class="group relative inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-orange-200 hover:bg-primary-700 hover:-translate-y-0.5 transition-all duration-300 focus:ring-4 focus:ring-primary-100 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Tambah Testimoni Baru
                    </button>
                </div>

                <div x-show="showModal" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4"
                    style="display: none;"> 
                    
                    <div @click.away="showModal = false"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                        class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden border border-white/20 max-h-[90vh] flex flex-col">

                        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                            <div>
                                <h2 class="text-lg font-bold text-slate-800">Foto Bukti Chat</h2>
                                <p class="text-xs text-slate-500">Format memanjang (screenshot HP).</p>
                            </div>
                            <button @click="showModal = false" class="p-2 rounded-full hover:bg-red-50 text-slate-400 hover:text-red-500 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>

                        <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                            <form id="uploadForm" action="" method="POST" enctype="multipart/form-data">
                                
                                <div class="mx-auto max-w-[260px] relative group">
                                    
                                    <div class="relative w-full aspect-[9/16] rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 overflow-hidden transition-all duration-300 ease-in-out group-hover:border-orange-400 group-hover:bg-orange-50/30 flex flex-col justify-center items-center" id="dropzone-container">
                                        
                                        <input type="file" id="image-input" accept="image/png, image/jpeg" class="absolute inset-0 z-20 w-full h-full opacity-0 cursor-pointer" onchange="previewImage(this)">

                                        <div id="upload-placeholder" class="flex flex-col items-center justify-center p-4 text-center transition-all duration-300 ease-in-out z-10">
                                            <div class="mb-3 p-3 bg-white text-orange-500 rounded-full shadow-sm border border-orange-100 transition-transform duration-300 group-hover:scale-110 group-hover:shadow-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 transition-transform duration-300 group-hover:-translate-y-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <p class="text-sm font-semibold text-gray-700">Klik upload</p>
                                            <p class="text-[10px] text-gray-500 mt-1">Drag & drop screenshot</p>
                                        </div>

                                        <img id="image-preview" class="absolute inset-0 z-0 w-full h-full object-cover opacity-0 transition-opacity duration-500" src="" alt="Preview Screenshot">
                                    
                                        <button type="button" id="remove-image-btn" onclick="removeImage()" class="absolute top-2 right-2 z-30 hidden p-1.5 bg-white/80 backdrop-blur-sm text-gray-600 rounded-full hover:bg-red-50 hover:text-red-500 transition-all shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                            <button @click="showModal = false" 
                                    class="px-5 py-2 rounded-xl text-sm text-slate-600 font-medium hover:bg-gray-200 hover:text-slate-800 transition-colors">
                                Batal
                            </button>
                            <button type="submit" form="uploadForm" class="px-5 py-2 rounded-xl bg-orange-600 text-white text-sm font-bold shadow-lg shadow-orange-200 hover:bg-orange-700 hover:-translate-y-0.5 transition-all">
                                Simpan
                            </button>
                        </div>

                    </div>
                </div>
                </div>
                
            <!-- Table Container -->
            <!-- Container Utama dengan Logic Data -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden" 
                x-data="menuManager()">

                <!-- TABLE -->
                <div x-data="{
                    search: '',
                    currentPage: 1,
                    itemsPerPage: 3, // Ubah angka ini untuk mengatur jumlah item per halaman
                    
                    // STATE MODAL
                    showModal: false,
                    modalMode: 'add', // 'add' atau 'edit'
                    
                    // DATA FORM SEMENTARA
                    formData: {
                        id: null,
                        imagePreview: '' // URL Gambar (Lama atau Baru)
                    },

                    // FUNGSI BUKA MODAL
                    openModal(mode, id = null) {
                        this.modalMode = mode;
                        this.showModal = true;
                        
                        // Reset Input File fisik agar bersih
                        const inputElement = document.getElementById('image-input');
                        if (inputElement) inputElement.value = '';

                        if (mode === 'edit') {
                            // 1. Cari data berdasarkan ID
                            // Gunakan '==' agar aman jika ID berupa string vs number
                            const item = this.items.find(i => i.id == id);
                            
                            if (item) {
                                // 2. Isi formData dengan gambar LAMA dari database/array
                                this.formData = {
                                    id: item.id,
                                    imagePreview: item.image 
                                };
                            }
                        } else {
                            // Mode Add: Kosongkan form
                            this.formData = { id: Date.now(), imagePreview: '' };
                        }
                    },
                    
                    // FUNGSI HANDLE UPLOAD (Kunci agar preview muncul)
                    handleFileUpload(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                // Update data Alpine (Otomatis update UI)
                                this.formData.imagePreview = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    },

                    // FUNGSI SIMPAN
                    saveData() {
                        if (!this.formData.imagePreview) {
                            alert('Harap pilih gambar!');
                            return;
                        }
                        if (this.modalMode === 'add') {
                            this.items.unshift({ id: Date.now(), image: this.formData.imagePreview, title: 'Testimoni Baru' });
                        } else {
                            // Update data yang ada
                            const index = this.items.findIndex(i => i.id == this.formData.id);
                            if (index !== -1) this.items[index].image = this.formData.imagePreview;
                        }
                        this.showModal = false;
                    },

                    // DATA DUMMY (Simulasi Database)
                    items: [
                        { id: 1, image: 'https://placehold.co/450x800/png?text=Chat+1', title: 'Testimoni 1' },
                        { id: 2, image: 'https://placehold.co/450x800/png?text=Chat+2', title: 'Testimoni 2' },
                        { id: 3, image: 'https://placehold.co/450x800/png?text=Chat+3', title: 'Testimoni 3' },
                        { id: 4, image: 'https://placehold.co/450x800/png?text=Chat+4', title: 'Testimoni 4' },
                        { id: 5, image: 'https://placehold.co/450x800/png?text=Chat+5', title: 'Testimoni 5' },
                        { id: 6, image: 'https://placehold.co/450x800/png?text=Chat+6', title: 'Testimoni 6' },
                        { id: 7, image: 'https://placehold.co/450x800/png?text=Chat+7', title: 'Testimoni 7' },
                    ],

                    // LOGIC 1: Filter Data (Jika nanti mau dipasang fitur search)
                    get filteredData() {
                        return this.items.filter(item => 
                            item.title.toLowerCase().includes(this.search.toLowerCase())
                        );
                    },

                    // LOGIC 2: Ambil Data sesuai Halaman (Pagination Logic)
                    get paginatedData() {
                        const start = (this.currentPage - 1) * this.itemsPerPage;
                        const end = start + this.itemsPerPage;
                        return this.filteredData.slice(start, end);
                    },

                    // LOGIC 3: Hitung Total Halaman
                    get totalPages() {
                        return Math.ceil(this.filteredData.length / this.itemsPerPage);
                    },

                    // FUNGSI NAVIGASI
                    nextPage() { if (this.currentPage < this.totalPages) this.currentPage++; },
                    prevPage() { if (this.currentPage > 1) this.currentPage--; },
                    goToPage(page) { this.currentPage = page; }
                }" class="bg-white border border-t-0 border-gray-100 rounded-b-xl shadow-sm min-h-[500px] flex flex-col">

                    <div class="p-8 flex-grow">
                        <div id="testimoni-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            
                            <template x-for="item in paginatedData" :key="item.id">
                                <div class="group relative flex flex-col gap-4 transition-all duration-500 ease-in-out"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100">
                                    
                                    <div class="relative w-full aspect-[9/16] bg-gray-100 rounded-2xl overflow-hidden shadow-md border border-gray-200 group-hover:shadow-xl transition-all duration-300">
                                        <img :src="item.image" :alt="item.title" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
                                    </div>

                                    <div class="flex justify-center gap-4 mt-2 opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                                        <button @click="openModal('edit', item.id)" class="w-12 h-12 flex items-center justify-center rounded-xl border-2 border-gray-200 text-gray-500 hover:border-orange-500 hover:text-orange-600 hover:bg-orange-50 transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                        
                                        <button @click="deleteCard(item.id)" class="w-12 h-12 flex items-center justify-center rounded-xl border-2 border-gray-200 text-gray-500 hover:border-red-500 hover:text-red-600 hover:bg-red-50 transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <div x-show="paginatedData.length === 0" class="col-span-full text-center py-20 text-gray-400">
                                <i class="fa-regular fa-folder-open text-4xl mb-4 block"></i>
                                <p>Belum ada testimoni.</p>
                            </div>

                        </div>
                    </div>

                    <div class="p-5 border-t border-gray-100 bg-gray-50 rounded-b-xl flex flex-col sm:flex-row items-center justify-between gap-4"
                        x-show="filteredData.length > 0">
                        
                        <p class="text-sm text-slate-500">
                            Menampilkan <span class="font-bold text-slate-700" x-text="((currentPage - 1) * itemsPerPage) + 1"></span> 
                            - 
                            <span class="font-bold text-slate-700" x-text="Math.min(currentPage * itemsPerPage, filteredData.length)"></span> 
                            dari 
                            <span class="font-bold text-slate-700" x-text="filteredData.length"></span> Menu
                        </p>
                        
                        <div class="flex items-center gap-1">
                            <button @click="prevPage()" 
                                    :disabled="currentPage === 1"
                                    class="px-3 py-1 rounded-lg border border-gray-200 bg-white text-slate-500 text-sm hover:bg-gray-100 hover:text-primary-600 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                                Prev
                            </button>
                            
                            <template x-for="page in totalPages" :key="page">
                                <button @click="goToPage(page)" 
                                        class="w-8 h-8 rounded-lg text-sm font-medium transition-all duration-200 flex items-center justify-center"
                                        :class="currentPage === page ? 'bg-orange-500 text-white shadow-lg shadow-orange-200 scale-105' : 'bg-white border border-gray-200 text-slate-600 hover:bg-orange-50 hover:text-orange-600 hover:border-orange-200'"
                                        x-text="page">
                                </button>
                            </template>

                            <button @click="nextPage()" 
                                    :disabled="currentPage === totalPages"
                                    class="px-3 py-1 rounded-lg border border-gray-200 bg-white text-slate-500 text-sm hover:bg-gray-100 hover:text-primary-600 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                                Next
                            </button>
                        </div>
                    </div>
                    <div x-show="showModal" 
                        x-transition.opacity
                        class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4"
                        style="display: none;">

                        <div @click.away="showModal = false"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden border border-white/20 max-h-[90vh] flex flex-col relative">

                            <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                                <div>
                                    <h2 class="text-lg font-bold text-slate-800" 
                                        x-text="modalMode === 'add' ? 'Tambah Testimoni Baru' : 'Edit Testimoni'"></h2>
                                    <p class="text-xs text-slate-500">Format memanjang (screenshot HP).</p>
                                </div>
                                <button @click="showModal = false" class="p-2 rounded-full hover:bg-red-50 text-slate-400 hover:text-red-500 transition">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                                <form @submit.prevent="saveData()">
                                    
                                    <div class="mx-auto max-w-[260px] relative group">
                                        <div class="relative w-full aspect-[9/16] rounded-2xl border-2 overflow-hidden flex flex-col justify-center items-center transition-all duration-300"
                                            :class="formData.imagePreview ? 'border-solid border-gray-200 bg-white' : 'border-dashed border-gray-300 bg-gray-50 group-hover:bg-orange-50/30 group-hover:border-orange-300'">
                                            
                                            <input type="file" id="image-input" accept="image/*" 
                                                class="absolute inset-0 z-20 w-full h-full opacity-0 cursor-pointer" 
                                                @change="handleFileUpload($event)">

                                            <div x-show="!formData.imagePreview" 
                                                class="absolute inset-0 z-10 flex flex-col items-center justify-center p-4 text-center pointer-events-none">
                                                <div class="mb-3 p-3 bg-white text-orange-500 rounded-full shadow-sm border border-orange-100 group-hover:scale-110 transition-transform">
                                                    <i class="fa-regular fa-image text-2xl"></i>
                                                </div>
                                                <p class="text-sm font-bold text-gray-700">Klik untuk upload</p>
                                                <p class="text-[10px] text-gray-400 mt-1">Drag & drop screenshot</p>
                                            </div>

                                            <img x-show="formData.imagePreview" 
                                                :src="formData.imagePreview" 
                                                class="absolute inset-0 z-10 w-full h-full object-cover bg-white">
                                        
                                            <div x-show="formData.imagePreview"
                                                class="absolute inset-0 z-15 bg-black/40 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center pointer-events-none">
                                                <div class="bg-white/90 px-3 py-1.5 rounded-full flex items-center gap-2 shadow-sm transform translate-y-2 group-hover:translate-y-0 transition-transform">
                                                    <i class="fa-solid fa-pen text-orange-600 text-xs"></i>
                                                    <p class="text-xs font-bold text-orange-700">Ganti Foto</p>
                                                </div>
                                            </div>

                                            <button type="button" x-show="formData.imagePreview" 
                                                    @click.stop="formData.imagePreview = ''; document.getElementById('image-input').value = ''"
                                                    class="absolute top-3 right-3 z-30 p-2 bg-white/80 backdrop-blur-sm text-gray-500 rounded-full hover:bg-red-100 hover:text-red-600 transition-all shadow-sm">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-end gap-3">
                                        <button type="button" @click="showModal = false" class="px-5 py-2 rounded-xl text-sm text-slate-600 font-medium hover:bg-gray-100 transition">Batal</button>
                                        <button type="submit" class="px-5 py-2 rounded-xl bg-orange-600 text-white text-sm font-bold shadow-lg shadow-orange-200 hover:bg-orange-700 hover:-translate-y-0.5 transition-all">
                                            <span x-text="modalMode === 'add' ? 'Simpan' : 'Update'"></span>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

            <!-- LOGIC ALPINE JS -->
            <script>
                function menuManager() {
                    return {
                        search: '',
                        sortCol: null, // Kolom yang sedang disortir (name, price, promo)
                        sortAsc: null, // Arah sort (true=Asc, false=Desc, null=Default)
                        currentPage: 1,
                        itemsPerPage: 5, // Ubah jumlah item per halaman disini
                        
                        // STATE MODAL
                        showModal: false,
                        modalMode: 'add', // 'add' atau 'edit'
                        imgPreview: null,

                        // Form Object
                        form: {
                            id: null,
                            name: '',
                            desc: '',
                            price: '',
                            promo: '',
                            isInactive: false, // False = Aktif, True = Non-Aktif
                            image: ''
                        },

                        // Data Dummy (Gantikan ini dengan data asli dari Database/API nanti)
                        items: [
                            { id: 1, name: 'Ayam Goreng Kremes', price: 90000, promo: true, desc: 'Ayam kampung yang dimarinasi dengan bumbu tradisional.', image: 'images/ayam_goreng_kremes.png' },
                            { id: 2, name: 'Ayam Bakar Kecap', price: 85000, promo: true, desc: 'Ayam kampung dibakar dengan olesan bumbu kecap manis.', image: 'images/ayam_kampung_bakar_kecap.png' },
                            { id: 3, name: 'Ayam Betutu Bali', price: 120000, promo: false, desc: 'Khas Bali dengan rempah yang sangat kuat dan pedas.', image: 'images/ayam_betutu.png' },
                            { id: 4, name: 'Ayam Pop Padang', price: 75000, promo: false, desc: 'Ayam goreng putih khas Minang dengan saus merah.', image: 'images/ayam_pop.png' },
                            { id: 5, name: 'Ayam Taliwang', price: 95000, promo: true, desc: 'Ayam bakar pedas khas Lombok yang menggugah selera.', image: 'images/ayam_taliwang.png' },
                            { id: 6, name: 'Ayam Penyet Surabaya', price: 45000, promo: false, desc: 'Ayam goreng dipenyet dengan sambal terasi pedas.', image: 'images/ayam_penyet.png' },
                            { id: 7, name: 'Ayam Woku Belanga', price: 88000, promo: false, desc: 'Masakan khas Manado dengan daun kemangi segar.', image: 'images/ayam_woku.png' },
                        ],

                        // === LOGIC MODAL ADD/EDIT ===
                        // Fungsi Buka Modal (Flexible: Bisa kosong utk Add, atau ada item utk Edit)
                        openModal(item = null) {
                            this.showModal = true;
                            if (item) {
                                // MODE EDIT
                                this.modalMode = 'edit';
                                // Copy data item ke form (Clone object agar tidak langsung berubah di tabel sebelum save)
                                this.form = { 
                                    ...item, 
                                    isInactive: !item.isActive // Konversi Active -> Inactive checkbox logic
                                }; 
                                this.imgPreview = item.image;
                            } else {
                                // MODE ADD (Reset Form)
                                this.modalMode = 'add';
                                this.form = { id: null, name: '', desc: '', price: '', promo: '', isInactive: false, image: '' };
                                this.imgPreview = null;
                            }
                        },

                        // Handle File Upload Preview
                        fileChosen(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = (e) => { this.imgPreview = e.target.result; }
                                reader.readAsDataURL(file);
                            }
                        },

                        // Fungsi Simpan (Mockup)
                        saveData() {
                            // Disini logika simpan ke Database/API
                            alert(this.modalMode === 'edit' ? 'Perubahan Disimpan!' : 'Menu Baru Ditambahkan!');
                            this.showModal = false;
                        },
                        
                        // 1. Logic Sorting & Searching
                        get filteredData() {
                            let data = this.items.filter(item => {
                                return item.name.toLowerCase().includes(this.search.toLowerCase()) || 
                                    item.desc.toLowerCase().includes(this.search.toLowerCase());
                            });

                            if (this.sortCol && this.sortAsc !== null) {
                                data = data.sort((a, b) => {
                                    let valA = a[this.sortCol];
                                    let valB = b[this.sortCol];
                                    
                                    // Handle Text Sorting
                                    if (typeof valA === 'string') {
                                        valA = valA.toLowerCase();
                                        valB = valB.toLowerCase();
                                    }
                                    // Handle Boolean Sorting (Promo)
                                    if (typeof valA === 'boolean') {
                                        valA = valA ? 1 : 0;
                                        valB = valB ? 1 : 0;
                                    }

                                    if (valA < valB) return this.sortAsc ? -1 : 1;
                                    if (valA > valB) return this.sortAsc ? 1 : -1;
                                    return 0;
                                });
                            }
                            return data;
                        },

                        // 2. Logic Pagination
                        get totalPages() {
                            return Math.ceil(this.filteredData.length / this.itemsPerPage);
                        },

                        get paginatedData() {
                            const start = (this.currentPage - 1) * this.itemsPerPage;
                            const end = start + this.itemsPerPage;
                            return this.filteredData.slice(start, end);
                        },

                        // 3. Function Helpers
                        nextPage() {
                            if (this.currentPage < this.totalPages) this.currentPage++;
                        },
                        prevPage() {
                            if (this.currentPage > 1) this.currentPage--;
                        },
                        goToPage(page) {
                            this.currentPage = page;
                        },
                        
                        // Function Sorting 3 Kondisi: Asc -> Desc -> Default
                        sortBy(col) {
                            if (this.sortCol === col) {
                                if (this.sortAsc === true) this.sortAsc = false; // Ke Descending
                                else if (this.sortAsc === false) { // Reset ke Default
                                    this.sortAsc = null;
                                    this.sortCol = null;
                                }
                            } else {
                                this.sortCol = col;
                                this.sortAsc = true; // Default Start Ascending
                            }
                            this.currentPage = 1; // Reset ke halaman 1 saat di-sort
                        }
                    }
                }

                // modal tambah testimoni
                // Fungsi untuk menangani preview gambar
                function previewImage(input) {
                    const container = document.getElementById('dropzone-container');
                    const placeholder = document.getElementById('upload-placeholder');
                    const preview = document.getElementById('image-preview');
                    const removeBtn = document.getElementById('remove-image-btn');

                    if (input.files && input.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            
                            // Animasi masuk
                            placeholder.style.opacity = '0'; // Fade out placeholder
                            setTimeout(() => {
                                placeholder.classList.add('hidden');
                                preview.classList.remove('opacity-0'); // Fade in image
                                removeBtn.classList.remove('hidden'); // Munculkan tombol hapus
                                // Ubah border container agar terlihat solid saat ada gambar
                                container.classList.remove('border-dashed', 'border-3');
                                container.classList.add('border-solid', 'border', 'border-gray-200');
                            }, 300);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                // Fungsi untuk menghapus gambar yang sudah dipilih
                function removeImage() {
                    const input = document.getElementById('image-input');
                    const container = document.getElementById('dropzone-container');
                    const placeholder = document.getElementById('upload-placeholder');
                    const preview = document.getElementById('image-preview');
                    const removeBtn = document.getElementById('remove-image-btn');

                    // Reset value input file
                    input.value = '';
                    preview.src = '';

                    // Animasi keluar
                    preview.classList.add('opacity-0');
                    removeBtn.classList.add('hidden');
                    
                    setTimeout(() => {
                        placeholder.classList.remove('hidden');
                        // Gunakan sedikit delay agar transisi opacity terlihat
                        setTimeout(() => {
                            placeholder.style.opacity = '1';
                        }, 50);
                    
                        // Kembalikan style border dashed
                        container.classList.remove('border-solid', 'border', 'border-gray-200');
                        container.classList.add('border-dashed', 'border-3');
                    }, 300);
                }

                // Fungsi dummy untuk handle submit (sesuaikan dengan kebutuhanmu nanti)
                function handleFormSubmit(event) {
                    event.preventDefault();
                    const input = document.getElementById('image-input');
                    if (!input.files[0]) {
                        alert("Tolong upload screenshot terlebih dahulu!");
                        return;
                    }
                    // Lakukan logika upload ke server di sini...
                    alert("Simulasi: Testimoni berhasil disimpan!");
                    closeModal(); // Asumsi ada fungsi closeModal() dari Alpine/kode luarmu
                }
                
                // --- Delete Function ---
                function deleteCard(elementId) {
                    if(confirm('Apakah Anda yakin ingin menghapus testimoni ini?')) {
                        const card = document.getElementById(elementId);
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.9)';
                        
                        setTimeout(() => {
                            card.remove();
                        }, 300);
                    }
                }
                // card
                // function menuManager() {
                //     return {
                //         // ... (kode search, sort, pagination, form, dll tetap sama) ...

                //         // Data Dummy (Pastikan formatnya konsisten)
                //         items: [
                //             { id: 1, name: 'Ayam Goreng', price: 90000, promo: true, isActive: true, ... },
                //             { id: 2, name: 'Ayam Bakar', price: 85000, promo: false, isActive: true, ... },
                //             // ... data lainnya
                //         ],

                //         // === TAMBAHKAN 3 FUNGSI INI DI SINI ===
                        
                //         // 1. Hitung Total Semua Menu
                //         get totalItems() {
                //             return this.items.length;
                //         },

                //         // 2. Hitung Menu yang Statusnya Aktif (isActive: true)
                //         get activeItems() {
                //             return this.items.filter(item => item.isActive).length;
                //         },

                //         // 3. Hitung Menu yang sedang Promo (promo: true atau angka > 0)
                //         get promoItems() {
                //             return this.items.filter(item => item.promo).length;
                //         },

                //         // ... (fungsi openModal, saveData, dll tetap sama) ...
                //     }
                // }
            </script>

            <footer class="mt-10 text-center text-sm text-slate-400 pb-4">
                &copy; 2025 Ayam Kabogor. All rights reserved.
            </footer>

        </main>
    </div>

</body>
</html>
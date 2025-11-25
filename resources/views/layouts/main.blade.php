<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ayam Kabogor') - Vegasa Catering</title>
    
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo_ayam_kabogor.png') }}?v=3">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo_ayam_kabogor.png') }}?v=3">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS (Via CDN sesuai file HTML user) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: '#EA580C', // Orange Utama
                            secondary: '#FFF7ED', // Cream Background
                            accent: '#4338ca', // Biru Aksen
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        script: ['Dancing Script', 'cursive'],
                    }
                }
            }
        }
    </script>

    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom-landing.css') }}">
    
    @stack('styles')
</head>
<body class="bg-brand-secondary text-gray-800 antialiased" x-data="{ isModalOpen: false }">

    <nav 
        x-data="{ scrolled: false, mobileMenuOpen: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="scrolled ? 'bg-white/80 backdrop-blur-md shadow-md py-4' : 'bg-brand-secondary py-6 shadow-none'"
        class="fixed top-0 w-full z-50 transition-all duration-300 ease-in-out border-b border-transparent"
    >
        <div class="container mx-auto px-6 lg:px-12 flex justify-between items-center">
            <a href="#" class="flex items-center gap-2 group">
                {{-- Pastikan path logo sesuai dengan aset kamu --}}
                <img src="{{ asset('assets/img/logo_ayam.png') }}" alt="Logo Ayam Kabogor" class="h-12 w-auto object-contain group-hover:scale-105 transition-transform">
            </a>

            <div class="hidden md:flex items-center space-x-8 font-medium text-[#972C02]">
                <a href="#beranda" class="hover:text-brand-primary transition-colors">Beranda</a>
                <a href="#produk" class="hover:text-brand-primary transition-colors">Produk</a>
                <a href="#keunggulan" class="hover:text-brand-primary transition-colors">Keunggulan</a>
                <a href="#testimoni" class="hover:text-brand-primary transition-colors">Testimoni</a>
                <a href="#faq" class="hover:text-brand-primary transition-colors">FAQ</a>
            </div>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden bg-white shadow-xl absolute w-full top-full left-0 py-4 px-6 flex flex-col gap-4 border-t">
            <a href="#beranda" class="hover:text-brand-primary font-medium">Beranda</a>
            <a href="#produk" class="hover:text-brand-primary font-medium">Produk</a>
            <a href="#keunggulan" class="hover:text-brand-primary font-medium">Keunggulan</a>
            <a href="#testimoni" class="hover:text-brand-primary font-medium">Testimoni</a>
            <a href="#faq" class="hover:text-brand-primary font-medium">FAQ</a>
        </div>
    </nav>

    {{-- Content Dinamis --}}
    @yield('content')

    <footer id="footer" class="bg-orange-50/50 pt-20 pb-10 relative" x-data="{ showScroll: false }" @scroll.window="showScroll = (window.pageYOffset > 300)">
    
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-orange-200 to-transparent opacity-50"></div>

        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-2 mb-12">
                
                <div class="lg:col-span-6 space-y-10">
                    <a href="#" class="block w-48">
                        <img src="{{ asset('assets/img/logo_ayam.png') }}" alt="Logo Ayam Kabogor" class="w-full h-auto object-contain">
                    </a>

                    <div class="flex flex-col sm:flex-row items-start gap-10 lg:gap-24">
                        <div>
                            <h3 class="font-serif text-xl text-gray-900 font-bold mb-5">Jelajahi</h3>
                            <ul class="space-y-3">
                                <li><a href="#beranda" class="text-gray-600 hover:text-brand-primary transition-colors font-medium text-base">Beranda</a></li>
                                <li><a href="#produk" class="text-gray-600 hover:text-brand-primary transition-colors font-medium text-base">Produk Kami</a></li>
                                <li><a href="#keunggulan" class="text-gray-600 hover:text-brand-primary transition-colors font-medium text-base">Kelebihan</a></li>
                                <li><a href="#testimoni" class="text-gray-600 hover:text-brand-primary transition-colors font-medium text-base">Testimoni</a></li>
                                <li><a href="#faq" class="text-gray-600 hover:text-brand-primary transition-colors font-medium text-base">FAQ & Bantuan</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl text-gray-900 font-bold mb-5">Terhubung</h3>
                            <div class="flex gap-3">
                                <a href="https://wa.me/6282122103241" target="_blank" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-[#25D366] hover:text-white hover:border-[#25D366] transition-all shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://www.instagram.com/ayam_kabogor" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-gradient-to-tr hover:from-yellow-400 hover:via-red-500 hover:to-purple-600 hover:text-white hover:border-transparent transition-all shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.tiktok.com/@ayamkabogor?_r=1&_t=ZS-91fzlDQiKKA" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-black hover:text-white hover:border-black transition-all shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                                <a href="https://www.facebook.com/ayamkabogor" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all shadow-sm hover:shadow-md transform hover:-translate-y-1">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6 space-y-6">
                    <div class="w-full h-64 lg:h-72 rounded-2xl overflow-hidden shadow-lg border-4 border-white relative group">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.863313943267!2d106.73914877355925!3d-6.538940063921078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c57314e99fab%3A0xba5a28cb42daaa23!2sAyam%20Kabogor%20(Ayam%20Kampung%20dan%20Bebek)!5e0!3m2!1sen!2sid!4v1764015604721!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <a href="https://goo.gl/maps/XYZ" target="_blank" class="absolute bottom-4 right-4 bg-white text-gray-800 px-4 py-2 rounded-full font-bold text-xs shadow-md hover:bg-brand-primary hover:text-white transition-colors flex items-center gap-2">
                            <span>Buka Peta</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                    <div class="flex items-start gap-4 p-2">
                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800 text-lg">Lokasi:</p>
                            <p class="text-gray-600 leading-relaxed">Jl. Atang Sanjaya KM. 2, Bantarsari, Rancabungur,<br>Bogor 16310.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-orange-200/60 pt-8 text-center text-sm text-gray-500">
                <p>© 2025 <span class="font-bold text-brand-primary">Ayam Kabogor</span>. All rights reserved.</p>
            </div>
        </div>

        <button 
            x-cloak
            x-show="showScroll"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="fixed bottom-8 right-8 z-50 bg-red-600 hover:bg-red-700 text-white p-4 rounded-full shadow-lg shadow-red-500/40 hover:shadow-xl transition-all hover:-translate-y-1 flex items-center justify-center group"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>
    </footer>

    {{-- Script untuk FontAwesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    
    @stack('scripts')
</body>
</html>
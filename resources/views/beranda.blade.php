@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

    <section id="beranda" class="relative min-h-screen flex items-center pt-32 pb-12 overflow-hidden">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12 lg:gap-20">
                
                <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left z-10">
                    <div>
                        <h1 class="text-5xl lg:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600 mb-6 leading-normal pb-2 pr-2">
                            Ayam Kabogor
                        </h1>
                        
                        <p class="text-3xl lg:text-4xl font-script text-brand-accent transform -rotate-2 mt-2 mb-8">
                            Vegasa Catering
                        </p>
                    </div>
                    
                    <p class="text-[#972C02] text-lg leading-relaxed">
                        Pilihan sehat, rasa nikmat untuk setiap acara anda. Dapatkan kelezatan autentik ayam kampung yang diolah secara alami tanpa bahan buatan. Selain ayam kampung, Ayam Kabogor juga menawarkan berbagai menu lainnya seperti olahan bebek, prasmanan, dan nasi kotak berbagai varian.
                    </p>

                    <h3 class="text-xl font-bold text-brand-primary">
                            Ayam Kampung Asli Bogor yang Gurih dan Alami
                    </h3>

                    <div class="pt-4 pb-8"> 
                        <button 
                            @click="isModalOpen = true"
                            class="bg-brand-primary hover:bg-orange-700 text-white font-bold py-4 px-8 rounded-full shadow-lg shadow-orange-500/30 transform hover:-translate-y-1 transition-all duration-300 text-lg flex items-center gap-2 mx-auto lg:mx-0"
                        >
                            <span>Pesan Sekarang</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 relative flex justify-center items-center my-10 lg:my-0">
                    <div class="relative w-[350px] h-[350px] md:w-[480px] md:h-[480px] lg:w-[580px] lg:h-[580px] flex items-center justify-center">
                        <div class="absolute inset-0 bg-orange-200/60 animate-blob-shape mix-blend-multiply filter blur-sm -z-10"></div>
                        {{-- Gambar Hero --}}
                        <img src="{{ asset('assets/img/ayam_ka/ayam_homepage.png') }}" alt="Ayam Kabogor Dish" class="relative w-[105%] max-w-none drop-shadow-2xl z-10 animate-float-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div 
        x-cloak
        x-show="isModalOpen" 
        class="fixed inset-0 z-[100] flex items-center justify-center p-4"
    >
        <div 
            x-show="isModalOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="isModalOpen = false"
            class="absolute inset-0 bg-black/60 backdrop-blur-sm"
        ></div>

        <div 
            x-show="isModalOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-90 translate-y-4"
            class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border-4 border-brand-primary/20"
        >
            <div class="h-2 bg-brand-primary w-full"></div>
            
            <div class="p-8 text-center">
                <div class="mx-auto w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fab fa-whatsapp text-3xl text-green-600"></i>
                </div>

                <h3 class="text-2xl font-bold text-brand-primary mb-2">
                    Tanya Admin untuk Pemesanan
                </h3>
                <p class="text-gray-500 mb-8 text-sm">
                    Klik tombol di bawah untuk terhubung langsung dengan WhatsApp Admin kami.
                </p>

                <a 
                    href="https://wa.me/6282122103241?text=Halo%20Admin%20Ayam%20Kabogor%2C%20saya%20mau%20bertanya" 
                    target="_blank"
                    class="block w-full bg-[#25D366] hover:bg-[#20bd5a] text-white font-bold py-3 px-4 rounded-xl shadow-lg transform active:scale-95 transition-all flex items-center justify-center gap-2"
                >
                    <i class="fab fa-whatsapp text-xl"></i>
                    Pesan WhatsApp
                </a>

                <button 
                    @click="isModalOpen = false"
                    class="mt-4 text-gray-400 hover:text-gray-600 text-sm font-medium underline decoration-gray-300"
                >
                    Kembali
                </button>
            </div>
        </div>
    </div>

    <section id="produk" class="relative py-20 bg-brand-secondary overflow-hidden" x-data="productApp()">
        
        {{-- Background Blobs --}}
        <div class="absolute top-1/2 left-0 w-64 h-64 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-1/2 right-0 w-64 h-64 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

        <div class="container mx-auto px-4 lg:px-12 relative z-10">
            
            <div class="text-center mb-12">
                <span class="text-brand-primary font-bold tracking-wider uppercase text-sm bg-orange-100 px-4 py-1 rounded-full border border-orange-200">
                    Menu Spesial
                </span>
                <h2 class="mt-4 text-4xl lg:text-5xl font-extrabold text-gray-800 mb-4">
                    Daftar <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600 relative inline-block">
                        Produk
                        <svg class="absolute w-full h-3 -bottom-1 left-0 text-yellow-400 opacity-60" viewBox="0 0 100 10" preserveAspectRatio="none">
                            <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
                        </svg>
                    </span>
                </h2>
                <p class="text-gray-500 max-w-2xl mx-auto">
                    Pilihan menu andalan kami yang diolah dengan bumbu rahasia dan bahan berkualitas terbaik.
                </p>
            </div>

            <div class="relative max-w-6xl mx-auto">
                
                {{-- Tombol Prev --}}
                <button @click="prevPage" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 lg:-translate-x-12 z-20 bg-white hover:bg-orange-50 text-brand-primary p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Carousel Container --}}
                <div class="overflow-hidden py-4">
                    <div class="flex will-change-transform" :class="isTransitioning ? 'transition-transform duration-500 ease-out' : ''" :style="`transform: translateX(-${currentIndex * (100 / itemsPerPage)}%)`">
                        <template x-for="product in products" :key="product.uniqueKey">
                            <div class="flex-shrink-0 px-3 w-full md:w-1/2 lg:w-1/3">
                                <div class="bg-white rounded-2xl shadow-xl shadow-orange-900/5 overflow-hidden h-full flex flex-col hover:-translate-y-2 transition-transform duration-300 border border-orange-50 group">
                                    
                                    {{-- CARD IMAGE: Dipaksa 1:1 dengan CSS inline untuk menimpa style lain --}}
                                    <div class="relative w-full bg-gray-100" style="aspect-ratio: 1/1; overflow: hidden;">
                                        <img :src="product.image" :alt="product.name" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" style="width: 100%; height: 100%; object-fit: cover;">
                                        
                                        <div x-show="product.isPromo" class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md animate-pulse z-10">
                                            Diskon <span x-text="product.discountPercentage"></span>%
                                        </div>
                                    </div>

                                    <div class="p-6 flex flex-col flex-grow">
                                        <h3 class="text-xl font-bold text-gray-800 mb-2 leading-tight line-clamp-1" x-text="product.name"></h3>
                                        <p class="text-gray-500 text-sm mb-4 line-clamp-2" x-text="product.description"></p>
                                        
                                        <div class="mt-auto pt-4 border-t border-gray-100">
                                            <div class="flex justify-between items-end mb-4">
                                                <span class="text-sm text-gray-400 mb-1">Harga</span>
                                                <div class="text-right">
                                                    <template x-if="product.isPromo">
                                                        <div class="flex flex-col items-end">
                                                            <span class="text-xs text-gray-400 line-through decoration-red-500 decoration-1" x-text="formatRupiah(product.price)"></span>
                                                            <span class="text-2xl font-extrabold text-brand-primary" x-text="formatRupiah(calculateFinalPrice(product))"></span>
                                                        </div>
                                                    </template>
                                                    <template x-if="!product.isPromo">
                                                        <span class="text-2xl font-extrabold text-brand-primary" x-text="formatRupiah(product.price)"></span>
                                                    </template>
                                                </div>
                                            </div>
                                            
                                            <button @click="openModal(product)" class="w-full bg-brand-primary hover:bg-orange-700 text-white font-bold py-3 rounded-xl transition-colors shadow-lg shadow-orange-500/20 flex justify-center items-center gap-2 group-hover:shadow-orange-500/40">
                                                <span>Detail Menu</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Tombol Next --}}
                <button @click="nextPage" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 lg:translate-x-12 z-20 bg-white hover:bg-orange-50 text-brand-primary p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                {{-- Dots Pagination --}}
                <div class="flex justify-center mt-10">
                    <div class="flex items-center gap-2">
                        <template x-for="(page, index) in totalPages" :key="index">
                            <button @click="goToPage(index)" class="rounded-full transition-all duration-300" :class="{'w-8 h-3 bg-brand-primary shadow-md shadow-orange-500/50': currentPage === index, 'w-3 h-3 bg-gray-300 hover:bg-gray-400': currentPage !== index}" aria-label="Go to page"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <div x-cloak x-show="modalOpen" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true">
            <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="closeModal()" class="absolute inset-0 bg-gray-900/70 backdrop-blur-sm"></div>

            <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95 translate-y-8" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-8" class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row max-h-[90vh]">
                
                <div class="w-full md:w-1/2 relative bg-gray-100 flex-shrink-0" style="aspect-ratio: 1/1;">
                    <img :src="selectedProduct?.image" :alt="selectedProduct?.name" class="absolute inset-0 w-full h-full object-cover">
                    
                    <button @click="closeModal()" class="absolute top-4 left-4 bg-white/80 p-2 rounded-full md:hidden text-gray-800 shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col overflow-y-auto">
                    <button @click="closeModal()" class="hidden md:block absolute top-6 right-6 text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>

                    <div class="mb-6">
                        <div x-show="selectedProduct?.isPromo" class="inline-block bg-red-100 text-red-600 text-xs font-bold px-2 py-1 rounded mb-2 border border-red-200">
                            Diskon <span x-text="selectedProduct?.discountPercentage"></span>%
                        </div>
                        <h3 class="text-3xl font-extrabold text-gray-800 leading-tight" x-text="selectedProduct?.name"></h3>
                        <div class="mt-2 flex items-center gap-3">
                             <template x-if="selectedProduct?.isPromo">
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 line-through text-lg" x-text="formatRupiah(selectedProduct?.price)"></span>
                                    <span class="text-brand-primary text-3xl font-bold" x-text="formatRupiah(calculateFinalPrice(selectedProduct))"></span>
                                </div>
                            </template>
                            <template x-if="!selectedProduct?.isPromo">
                                <span class="text-brand-primary text-3xl font-bold" x-text="formatRupiah(selectedProduct?.price)"></span>
                            </template>
                        </div>
                    </div>

                    <div class="prose prose-orange text-gray-600 mb-8 text-sm md:text-base leading-relaxed">
                        <p x-text="selectedProduct?.description"></p>
                    </div>

                    <div class="mt-auto bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Jumlah Pesanan:</label>
                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex items-center bg-white border border-gray-300 rounded-lg shadow-sm">
                                <button @click="qty > 1 ? qty-- : null" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-brand-primary transition rounded-l-lg font-bold text-lg disabled:opacity-50" :disabled="qty <= 1">-</button>
                                <input type="text" x-model="qty" readonly class="w-12 text-center border-x border-gray-200 font-bold text-gray-800 focus:outline-none">
                                <button @click="qty++" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-brand-primary transition rounded-r-lg font-bold text-lg">+</button>
                            </div>
                            <div class="text-sm text-gray-400">
                                Total: <span class="font-bold text-gray-800 text-lg" x-text="formatRupiah(calculateTotalBill())"></span>
                            </div>
                        </div>

                        <a :href="generateWaLink()" target="_blank" class="w-full bg-[#EA580C] hover:bg-[#c2410c] text-white font-bold py-4 px-6 rounded-xl shadow-lg shadow-orange-500/30 transform active:scale-95 transition-all flex items-center justify-center gap-3 group">
                            <i class="fab fa-whatsapp text-xl"></i>
                            Pesan WhatsApp
                            <span class="ml-auto bg-white/20 px-2 py-0.5 rounded text-xs group-hover:bg-white/30 transition">Kirim</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="keunggulan" class="py-24 bg-white relative overflow-hidden" x-data>
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(#EA580C 1px, transparent 1px); background-size: 32px 32px;"></div>
        
        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brand-primary font-bold tracking-wider uppercase text-sm bg-orange-50 px-4 py-1 rounded-full border border-orange-100 shadow-sm">
                    Keunggulan
                </span>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-800 mt-4 mb-4">
                    Kenapa Memilih <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600">Ayam Kabogor?</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Item 1 --}}
                <div class="group relative bg-white rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-orange-500/20 hover:border-orange-200">
                    <div class="h-48 w-full rounded-xl overflow-hidden mb-6 relative bg-gray-50 border border-gray-100">
                        <img src="{{ asset('assets/img/ayam_ka/ayam_kampung.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Ayam Kampung">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-brand-primary transition-colors">Ayam Kampung Pilihan</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Kami hanya menggunakan ayam kampung asli yang dipilih secara ketat untuk kualitas terbaik.</p>
                </div>
                {{-- Item 2 --}}
                <div class="group relative bg-white rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-orange-500/20 hover:border-orange-200">
                    <div class="h-48 w-full rounded-xl overflow-hidden mb-6 relative bg-gray-50 border border-gray-100">
                        <img src="{{ asset('assets/img/ayam_ka/halal.webp') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Halal">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-brand-primary transition-colors">Terjamin Halal</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Semua proses dari penyembelihan hingga pengolahan sesuai syariat Islam.</p>
                </div>
                {{-- Item 3 --}}
                <div class="group relative bg-white rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-orange-500/20 hover:border-orange-200">
                    <div class="h-48 w-full rounded-xl overflow-hidden mb-6 relative bg-gray-50 border border-gray-100">
                        <img src="{{ asset('assets/img/ayam_ka/rempah.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Rempah">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-brand-primary transition-colors">Bumbu Rempah Asli</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Resep warisan menggunakan 100% rempah alami tanpa bumbu instan buatan.</p>
                </div>
                {{-- Item 4 --}}
                <div class="group relative bg-white rounded-2xl p-6 transition-all duration-300 hover:-translate-y-2 border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-orange-500/20 hover:border-orange-200">
                    <div class="h-48 w-full rounded-xl overflow-hidden mb-6 relative bg-gray-50 border border-gray-100">
                        <img src="{{ asset('assets/img/ayam_ka/sehat.webp') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Sehat">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-brand-primary transition-colors">Sehat & Alami</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Diolah secara higienis tanpa bahan kimia berbahaya, aman untuk keluarga.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="testimoni" class="py-24 bg-brand-secondary relative overflow-hidden" x-data="testimonialApp()">
        
        <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-orange-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-96 h-96 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="container mx-auto px-4 lg:px-12 relative z-10">
            
            <div class="text-center mb-16">
                <span class="text-brand-primary font-bold tracking-wider uppercase text-sm bg-orange-100 px-4 py-1 rounded-full border border-orange-200">
                    Testimoni Asli
                </span>
                <h2 class="text-3xl lg:text-5xl font-extrabold text-gray-800 mt-4 mb-4">
                    Apa Kata <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600">Mereka?</span>
                </h2>
                <p class="text-gray-500 max-w-2xl mx-auto text-lg">
                    Bukti kepuasan nyata dari pelanggan setia Ayam Kabogor.
                </p>
            </div>

            <div class="relative max-w-7xl mx-auto">
                
                <button 
                    @click="prevSlide" 
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-2 lg:-translate-x-12 z-20 bg-white text-gray-800 hover:text-brand-primary p-4 rounded-full shadow-xl transition-all duration-300 hover:scale-110 border border-gray-100 hidden md:flex items-center justify-center group"
                    :disabled="currentIndex === 0"
                    :class="currentIndex === 0 ? 'opacity-50 cursor-not-allowed' : 'opacity-100'"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <div class="overflow-hidden py-10 px-2"> 
                    <div 
                        class="flex transition-transform duration-700 ease-out"
                        :style="`transform: translateX(-${currentIndex * (100 / itemsPerPage)}%)`"
                    >
                        <template x-for="(item, index) in testimonials" :key="index">
                            <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-4 lg:px-6">
                                <div class="relative group mx-auto max-w-[300px]">
                                    <div class="relative bg-gray-900 rounded-[2.5rem] border-[8px] border-gray-900 shadow-2xl overflow-hidden transform transition-all duration-500 hover:-translate-y-4 hover:shadow-orange-500/20">
                                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 h-6 w-32 bg-gray-900 rounded-b-xl z-20"></div>
                                        <div class="relative bg-gray-50 rounded-[2rem] overflow-hidden aspect-[9/18] flex items-center justify-center p-2">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent z-10 pointer-events-none"></div>
                                            <img :src="item.image" class="w-full h-full object-contain rounded-2xl relative z-0" alt="Testimoni Pelanggan">
                                        </div>
                                    </div>
                                    <div class="text-center mt-8 opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100">
                                        <h4 class="font-bold text-gray-800" x-text="item.name"></h4>
                                        <p class="text-sm text-brand-primary" x-text="item.menu"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <button 
                    @click="nextSlide" 
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-2 lg:translate-x-12 z-20 bg-white text-gray-800 hover:text-brand-primary p-4 rounded-full shadow-xl transition-all duration-300 hover:scale-110 border border-gray-100 hidden md:flex items-center justify-center group"
                    :disabled="isEnd"
                    :class="isEnd ? 'opacity-50 cursor-not-allowed' : 'opacity-100'"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

            </div>
        </div>
    </section>

    <section id="faq" class="py-24 bg-white relative" x-data="faqApp()">
        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-24 items-start">
                
                <div class="w-full lg:w-1/3 transition-all duration-300">
                    <div>
                        <span class="text-brand-primary font-bold tracking-wider uppercase text-sm bg-orange-100 px-4 py-1 rounded-full border border-orange-200">FAQ</span>
                        <h2 class="text-3xl lg:text-5xl font-extrabold text-gray-800 mt-4 mb-6 leading-tight">
                            Pertanyaan <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-red-600">Sering Diajukan</span>
                        </h2>
                        <div class="hidden lg:block mt-8 bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-100 shadow-xl shadow-orange-500/5 relative overflow-hidden group">
                            <h4 class="font-bold text-gray-800 mb-2 relative z-10">Pertanyaan belum terjawab?</h4>
                            <a href="https://wa.me/6282122103241" target="_blank" class="inline-flex items-center bg-[#EA580C] hover:bg-[#c2410c] text-white font-bold py-3 px-6 rounded-xl transition-all shadow-md hover:shadow-lg gap-2 relative z-10 w-full justify-center">
                                Chat Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/3">
                    <div class="space-y-4">
                        <template x-for="item in displayedFaqs" :key="item.id">
                            <div class="group">
                                <button 
                                    @click="activeAccordion = activeAccordion === item.id ? null : item.id"
                                    class="w-full flex items-center justify-between p-5 rounded-xl text-left transition-all duration-300 border bg-white"
                                    :class="activeAccordion === item.id ? 'border-orange-500 shadow-md ring-1 ring-orange-500/20' : 'border-gray-100 hover:border-red-200'"
                                >
                                    <span class="font-bold transition-colors duration-300 pr-4 leading-snug" :class="activeAccordion === item.id ? 'text-orange-600' : 'text-gray-700'" x-text="item.question"></span>
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300" :class="activeAccordion === item.id ? 'bg-gradient-to-r from-orange-500 to-red-600 text-white rotate-180' : 'bg-gray-50 text-gray-400'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                </button>
                                <div class="grid transition-all duration-500 ease-in-out" :class="activeAccordion === item.id ? 'grid-rows-[1fr] opacity-100 mt-2' : 'grid-rows-[0fr] opacity-0'">
                                    <div class="overflow-hidden">
                                        <div class="p-5 pt-2 text-gray-600 text-base leading-relaxed border-l-4 border-orange-500/30 ml-4 rounded-r-lg bg-gray-50/50">
                                            <p x-text="item.answer"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="mt-8 text-center" x-show="faqs.length > initialCount">
                        <button @click="isExpanded = !isExpanded" class="group inline-flex items-center gap-2 text-sm font-bold text-red-600 hover:text-orange-700 transition-colors border-b-2 border-dashed border-red-200 pb-1">
                            <span x-text="isExpanded ? 'Sembunyikan Pertanyaan' : `Lihat ${faqs.length - initialCount} Pertanyaan Lainnya`"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('productApp', () => ({
            currentIndex: 0,
            itemsPerPage: 3,
            modalOpen: false,
            selectedProduct: null,
            qty: 1,
            isTransitioning: true,
            realLength: 0,

            // Data Produk Awal
            rawProducts: [
                @foreach($menus as $menu)
                {
                    id: {{ $menu->id }},
                    name: "{{ $menu->nama_menu }}",
                    description: "{{ Str::limit($menu->deskripsi, 150) }}", 
                    price: {{ $menu->harga }},
                    discountPercentage: {{ $menu->promo ?? 0 }},
                    isPromo: {{ $menu->promo ? 'true' : 'false' }},
                    image: "{{ asset('storage/' . $menu->gambar) }}"
                },
                @endforeach
            ],
            
            products: [],

            init() {
                this.realLength = this.rawProducts.length;
                
                // Clone untuk efek infinite loop yang mulus
                // Kita clone sebanyak itemsPerPage (3)
                const clones = this.rawProducts.slice(0, 3).map(p => ({...p, uniqueKey: 'clone_' + p.id}));
                const originals = this.rawProducts.map(p => ({...p, uniqueKey: 'orig_' + p.id}));
                
                this.products = [...originals, ...clones];

                this.checkResponsive();
                window.addEventListener('resize', () => this.checkResponsive());
            },

            checkResponsive() {
                if (window.innerWidth < 768) { this.itemsPerPage = 1; } 
                else if (window.innerWidth < 1024) { this.itemsPerPage = 2; } 
                else { this.itemsPerPage = 3; }
                
                this.currentIndex = 0;
            },

            // --- LOGIKA GESER PER HALAMAN ---
            
            nextPage() {
                if (this.isTransitioning) {
                    this.currentIndex += this.itemsPerPage;
                    
                    if (this.currentIndex >= this.realLength) {
                        setTimeout(() => {
                            this.isTransitioning = false;
                            this.currentIndex = this.currentIndex % this.realLength;
                            requestAnimationFrame(() => {
                                requestAnimationFrame(() => {
                                    this.isTransitioning = true;
                                });
                            });
                        }, 500); 
                    }
                }
            },

            prevPage() {
                if (this.isTransitioning) {
                    if (this.currentIndex === 0) {
                        this.isTransitioning = false;
                        this.currentIndex = this.realLength;
                        
                        requestAnimationFrame(() => {
                            requestAnimationFrame(() => {
                                this.isTransitioning = true;
                                this.currentIndex -= this.itemsPerPage;
                            });
                        });
                    } else {
                        this.currentIndex -= this.itemsPerPage;
                        if (this.currentIndex < 0) this.currentIndex = 0;
                    }
                }
            },

            // --- LOGIKA DOTS PAGINATION (PAGE BASED) ---

            get totalPages() {
                return Math.ceil(this.realLength / this.itemsPerPage);
            },

            get currentPage() {
                let realIndex = this.currentIndex;
                if (realIndex >= this.realLength) realIndex = 0;
                return Math.floor(realIndex / this.itemsPerPage);
            },

            goToPage(pageIndex) {
                this.isTransitioning = true;
                this.currentIndex = pageIndex * this.itemsPerPage;
            },

            // --- LOGIKA MODAL ---

            openModal(product) {
                this.selectedProduct = product;
                this.qty = 1;
                this.modalOpen = true;
                document.body.style.overflow = 'hidden';
            },

            closeModal() {
                this.modalOpen = false;
                this.selectedProduct = null;
                document.body.style.overflow = 'auto';
            },

            formatRupiah(number) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
            },

            calculateFinalPrice(product) {
                if (!product) return 0;
                if (product.isPromo && product.discountPercentage > 0) {
                    return product.price - (product.price * (product.discountPercentage / 100));
                }
                return product.price;
            },

            calculateTotalBill() {
                if(!this.selectedProduct) return 0;
                const finalPrice = this.calculateFinalPrice(this.selectedProduct);
                return finalPrice * this.qty;
            },

            generateWaLink() {
                if (!this.selectedProduct) return '#';
                const phone = '6282122103241';
                const finalPrice = this.calculateFinalPrice(this.selectedProduct);
                const totalBill = this.calculateTotalBill();
                
                let message = `Halo, saya mau pesan menu ${this.selectedProduct.name} ${this.qty} porsi di Ayam Kabogor.`;
                
                if (this.selectedProduct.isPromo) {
                    message += ` (Harga Promo: ${this.formatRupiah(finalPrice)}/porsi). Total: ${this.formatRupiah(totalBill)}`;
                } else {
                    message += ` Total: ${this.formatRupiah(totalBill)}`;
                }

                return `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
            }
        }));

        // --- LOGIC TESTIMONI ---
        Alpine.data('testimonialApp', () => ({
            currentIndex: 0,
            itemsPerPage: 3,
            testimonials: [
                @foreach($testimonials as $testi)
                {
                    name: "{{ $testi->title ?? 'Pelanggan Setia' }}",
                    menu: 'Ayam Kabogor', 
                    image: "{{ asset('storage/' . $testi->foto_ss) }}"
                },
                @endforeach
            ],

            init() {
                this.checkResponsive();
                window.addEventListener('resize', () => this.checkResponsive());
            },

            checkResponsive() {
                if (window.innerWidth < 768) { this.itemsPerPage = 1; } 
                else if (window.innerWidth < 1024) { this.itemsPerPage = 2; } 
                else { this.itemsPerPage = 3; }
            },

            get isEnd() { return this.currentIndex >= this.testimonials.length - this.itemsPerPage; },
            nextSlide() { if (!this.isEnd) this.currentIndex++; },
            prevSlide() { if (this.currentIndex > 0) this.currentIndex--; }
        }));

        // --- LOGIC FAQ ---
        Alpine.data('faqApp', () => ({
            activeAccordion: null, 
            isExpanded: false,
            initialCount: 5,
            faqs: [
                @foreach($faqs as $faq)
                { 
                    id: {{ $faq->id }}, 
                    question: "{{ $faq->pertanyaan }}", 
                    answer: "{{ $faq->jawaban }}" 
                },
                @endforeach
            ],
            
            get displayedFaqs() {
                return this.isExpanded ? this.faqs : this.faqs.slice(0, this.initialCount);
            }
        }));
    });
</script>
@endpush
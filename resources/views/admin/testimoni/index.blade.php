@extends('layouts.admin')

@section('title', 'Manajemen Testimoni')
@section('page_title', 'Testimoni')

@section('content')
<div x-data="testimoniManager()">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Testimoni</h1>
            <p class="text-slate-500 mt-1">Kelola semua testimoni di sini.</p>
        </div>
        
        <button @click="openModal('add')" 
                class="group relative inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-500 text-white text-sm font-semibold rounded-xl shadow-lg shadow-orange-200 hover:bg-primary-600 hover:-translate-y-0.5 transition-all duration-300 focus:ring-4 focus:ring-primary-100 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Testimoni Baru
        </button>
    </div>

    <div class="bg-white border border-t-0 border-gray-100 rounded-b-xl shadow-sm min-h-[500px] flex flex-col rounded-2xl overflow-hidden">
        
        <div class="p-8 flex-grow">
            <div id="testimoni-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <template x-for="item in paginatedData" :key="item.id">
                    <div class="group relative flex flex-col gap-4 transition-all duration-500 ease-in-out">
                        
                        <div class="relative w-full aspect-[9/16] bg-gray-100 rounded-2xl overflow-hidden shadow-md border border-gray-200 group-hover:shadow-xl transition-all duration-300">
                            <img :src="item.image" :alt="item.title" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                                <p class="text-white font-bold text-sm truncate" x-text="item.title"></p>
                            </div>
                        </div>

                        <div class="flex justify-center gap-4 mt-2 opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                            <button @click="openModal('edit', item.id)" class="w-12 h-12 flex items-center justify-center rounded-xl border-2 border-gray-200 text-gray-500 hover:border-orange-500 hover:text-orange-600 hover:bg-orange-50 transition-all duration-300" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            
                            <button @click="deleteCard(item.id)" class="w-12 h-12 flex items-center justify-center rounded-xl border-2 border-gray-200 text-gray-500 hover:border-red-500 hover:text-red-600 hover:bg-red-50 transition-all duration-300" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                </template>

                <div x-show="paginatedData.length === 0" class="col-span-full text-center py-20 text-gray-400">
                    <i class="bi bi-folder2-open text-4xl mb-4 block"></i>
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
                <span class="font-bold text-slate-700" x-text="filteredData.length"></span> Testimoni
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
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                <form @submit.prevent="saveData()">
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul / Nama Pelanggan</label>
                        <input type="text" x-model="formData.title" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Contoh: Ibu Siti - Order 50 Box">
                    </div>

                    <div class="mx-auto max-w-[260px] relative group">
                        <div class="relative w-full aspect-[9/16] rounded-2xl border-2 overflow-hidden flex flex-col justify-center items-center transition-all duration-300"
                            :class="formData.imagePreview ? 'border-solid border-gray-200 bg-white' : 'border-dashed border-gray-300 bg-gray-50 group-hover:bg-orange-50/30 group-hover:border-orange-300'">
                            
                            <input type="file" id="image-input" accept="image/*" 
                                   class="absolute inset-0 z-20 w-full h-full opacity-0 cursor-pointer" 
                                   @change="handleFileUpload($event)">

                            <div x-show="!formData.imagePreview" 
                                class="absolute inset-0 z-10 flex flex-col items-center justify-center p-4 text-center pointer-events-none">
                                <div class="mb-3 p-3 bg-white text-orange-500 rounded-full shadow-sm border border-orange-100 group-hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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
                                    <p class="text-xs font-bold text-orange-700">Ganti Foto</p>
                                </div>
                            </div>

                            <button type="button" x-show="formData.imagePreview" 
                                    @click.stop="formData.imagePreview = ''; document.getElementById('image-input').value = ''"
                                    class="absolute top-3 right-3 z-30 p-2 bg-white/80 backdrop-blur-sm text-gray-500 rounded-full hover:bg-red-100 hover:text-red-600 transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
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
@endsection

@push('scripts')
<script>
    function testimoniManager() {
        return {
            search: '',
            currentPage: 1,
            itemsPerPage: 3, // Sesuai request: 3 item per halaman
            
            // STATE MODAL
            showModal: false,
            modalMode: 'add',
            
            // DATA FORM SEMENTARA
            formData: {
                id: null,
                title: '',
                imagePreview: ''
            },

            // DATA DUMMY (Sesuai HTML)
            items: [
                { id: 1, image: '{{ asset("assets/img//testimonials/testi1.png") }}', title: 'Testimoni 1' },
                { id: 2, image: 'https://placehold.co/450x800/png?text=Chat+2', title: 'Testimoni 2' },
                { id: 3, image: 'https://placehold.co/450x800/png?text=Chat+3', title: 'Testimoni 3' },
                { id: 4, image: 'https://placehold.co/450x800/png?text=Chat+4', title: 'Testimoni 4' },
                { id: 5, image: 'https://placehold.co/450x800/png?text=Chat+5', title: 'Testimoni 5' },
                { id: 6, image: 'https://placehold.co/450x800/png?text=Chat+6', title: 'Testimoni 6' },
                { id: 7, image: 'https://placehold.co/450x800/png?text=Chat+7', title: 'Testimoni 7' },
            ],

            // FUNGSI BUKA MODAL
            openModal(mode, id = null) {
                this.modalMode = mode;
                this.showModal = true;
                
                // Reset Input File
                const inputElement = document.getElementById('image-input');
                if (inputElement) inputElement.value = '';

                if (mode === 'edit') {
                    const item = this.items.find(i => i.id == id);
                    if (item) {
                        this.formData = {
                            id: item.id,
                            title: item.title,
                            imagePreview: item.image 
                        };
                    }
                } else {
                    this.formData = { id: Date.now(), title: '', imagePreview: '' };
                }
            },
            
            // FUNGSI HANDLE UPLOAD
            handleFileUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
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
                    this.items.unshift({ 
                        id: Date.now(), 
                        image: this.formData.imagePreview, 
                        title: this.formData.title || 'Testimoni Baru' 
                    });
                } else {
                    const index = this.items.findIndex(i => i.id == this.formData.id);
                    if (index !== -1) {
                        this.items[index].image = this.formData.imagePreview;
                        this.items[index].title = this.formData.title;
                    }
                }
                this.showModal = false;
            },

            // FUNGSI DELETE
            deleteCard(elementId) {
                if(confirm('Apakah Anda yakin ingin menghapus testimoni ini?')) {
                    this.items = this.items.filter(i => i.id !== elementId);
                }
            },

            // LOGIC FILTERING & PAGINATION
            get filteredData() {
                return this.items.filter(item => 
                    item.title.toLowerCase().includes(this.search.toLowerCase())
                );
            },
            get paginatedData() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.filteredData.slice(start, end);
            },
            get totalPages() {
                return Math.ceil(this.filteredData.length / this.itemsPerPage);
            },
            nextPage() { if (this.currentPage < this.totalPages) this.currentPage++; },
            prevPage() { if (this.currentPage > 1) this.currentPage--; },
            goToPage(page) { this.currentPage = page; }
        }
    }
</script>
@endpush
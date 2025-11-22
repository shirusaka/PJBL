@extends('layouts.admin')

@section('title', 'Manajemen Menu')
@section('page_title', 'Daftar Menu')

@section('content')

<div x-data="menuManager()">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Menu</h1>
            <p class="text-slate-500 mt-1">Kelola semua menu makanan katering Anda di sini.</p>
        </div>
        
        <button @click="openModal()" 
                class="group relative inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-orange-200 hover:bg-primary-700 hover:-translate-y-0.5 transition-all duration-300 focus:ring-4 focus:ring-primary-100 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Menu Baru
        </button>
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
                    <h3 class="text-3xl font-bold text-slate-800 tracking-tight">24 <span class="text-lg text-slate-400 font-normal">Item</span></h3>
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
                    <h3 class="text-3xl font-bold text-slate-800 tracking-tight">3 <span class="text-lg text-slate-400 font-normal">Item</span></h3>
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
                <input x-model="search" 
                    type="text" 
                    class="w-full py-2.5 pl-10 pr-4 text-sm text-slate-700 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition-all" 
                    placeholder="Cari menu ayam...">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-slate-500 font-semibold select-none">
                        <th class="px-6 py-4 w-16 text-center">#</th>
                        <th class="px-6 py-4 w-64">Gambar</th>
                        <th class="px-6 py-4 cursor-pointer hover:bg-gray-100 transition-colors group" @click="sortBy('name')">
                            <div class="flex items-center justify-between">
                                <span>Detail Menu</span>
                                <div class="flex flex-col ml-1">
                                    <svg class="w-3 h-3 -mb-1" :class="sortCol === 'name' && sortAsc === true ? 'text-primary-600' : 'text-slate-300'" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4l-8 8h16l-8-8z"/></svg>
                                    <svg class="w-3 h-3" :class="sortCol === 'name' && sortAsc === false ? 'text-primary-600' : 'text-slate-300'" fill="currentColor" viewBox="0 0 24 24"><path d="M12 20l8-8H4l8 8z"/></svg>
                                </div>
                            </div>
                        </th>
                        <th class="px-6 py-4 w-40 whitespace-nowrap cursor-pointer hover:bg-gray-100 transition-colors group" @click="sortBy('price')">
                            <div class="flex items-center justify-between">
                                <span>Harga</span>
                                <div class="flex flex-col ml-1">
                                    <svg class="w-3 h-3 -mb-1" :class="sortCol === 'price' && sortAsc === true ? 'text-primary-600' : 'text-slate-300'" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4l-8 8h16l-8-8z"/></svg>
                                    <svg class="w-3 h-3" :class="sortCol === 'price' && sortAsc === false ? 'text-primary-600' : 'text-slate-300'" fill="currentColor" viewBox="0 0 24 24"><path d="M12 20l8-8H4l8 8z"/></svg>
                                </div>
                            </div>
                        </th>
                        <th class="px-6 py-4 w-24 text-center cursor-pointer hover:bg-gray-100 transition-colors group" @click="sortBy('promo')">
                            <div class="flex items-center justify-center gap-1">
                                <span>Promo</span>
                                <div class="flex flex-col">
                                    <svg class="w-3 h-3 -mb-1" :class="sortCol === 'promo' && sortAsc === true ? 'text-primary-600' : 'text-slate-300'" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4l-8 8h16l-8-8z"/></svg>
                                    <svg class="w-3 h-3" :class="sortCol === 'promo' && sortAsc === false ? 'text-primary-600' : 'text-slate-300'" fill="currentColor" viewBox="0 0 24 24"><path d="M12 20l8-8H4l8 8z"/></svg>
                                </div>
                            </div>
                        </th>
                        <th class="px-6 py-4 w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100">
                    <template x-for="(item, index) in paginatedData" :key="item.id">
                        <tr class="hover:bg-gray-50/80 transition-colors group">
                            <td class="px-6 py-4 text-center text-slate-400 font-medium" x-text="(currentPage - 1) * itemsPerPage + index + 1"></td>
                            <td class="px-6 py-4">
                                <div class="relative w-48 aspect-[4/3] rounded-xl overflow-hidden bg-gray-200 shadow-sm border border-gray-100">
                                    <div class="absolute inset-0 flex items-center justify-center text-gray-400 bg-gray-100">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 00-2-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <img :src="item.image" class="relative z-10 w-full h-full object-cover object-[center_75%]" onerror="this.style.display='none'">
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="font-bold text-slate-800 text-base group-hover:text-primary-600 transition-colors" x-text="item.name"></span>
                                    <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed" x-text="item.desc"></p>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-bold text-slate-700 bg-slate-100 px-3 py-1 rounded-lg border border-slate-200" x-text="'Rp ' + item.price.toLocaleString('id-ID')"></span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border"
                                    :class="item.promo ? 'bg-green-100 text-green-700 border-green-200' : 'bg-gray-100 text-gray-500 border-gray-200'"
                                    x-text="item.promo ? 'Ya' : 'Tidak'">
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button @click="openModal(item)" class="p-2 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button @click="deleteCard(item.id)" class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    
                    <tr x-show="paginatedData.length === 0">
                        <td colspan="6" class="p-8 text-center text-slate-500">Tidak ada data yang cocok dengan pencarian.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-5 border-t border-gray-100 bg-white flex flex-col sm:flex-row items-center justify-between gap-4"
            x-show="filteredData.length > 0">
            <p class="text-sm text-slate-500">
                Menampilkan <span class="font-bold text-slate-700" x-text="((currentPage - 1) * itemsPerPage) + 1"></span> 
                - <span class="font-bold text-slate-700" x-text="Math.min(currentPage * itemsPerPage, filteredData.length)"></span> 
                dari <span class="font-bold text-slate-700" x-text="filteredData.length"></span> Menu
            </p>
            
            <div class="flex items-center gap-1">
                <button @click="prevPage()" :disabled="currentPage === 1" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-50 disabled:opacity-50">Prev</button>
                <template x-for="page in totalPages" :key="page">
                    <button @click="goToPage(page)" class="px-3 py-1 rounded-lg text-sm font-medium transition-colors"
                            :class="currentPage === page ? 'bg-primary-500 text-white shadow-md' : 'border border-gray-200 text-slate-600 hover:bg-gray-50'"
                            x-text="page"></button>
                </template>
                <button @click="nextPage()" :disabled="currentPage === totalPages" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-50 disabled:opacity-50">Next</button>
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
            class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl overflow-hidden border border-white/20 max-h-[90vh] flex flex-col">

            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <div>
                    <h2 class="text-xl font-bold text-slate-800" x-text="modalMode === 'edit' ? 'Edit Menu' : 'Tambah Menu Baru'"></h2>
                    <p class="text-sm text-slate-500" x-text="modalMode === 'edit' ? 'Perbarui detail menu yang dipilih.' : 'Isi detail menu katering di bawah ini.'"></p>
                </div>
                <button @click="showModal = false" class="p-2 rounded-full hover:bg-red-50 text-slate-400 hover:text-red-500 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="p-8 overflow-y-auto custom-scrollbar">
                <form @submit.prevent="saveData">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <div class="lg:col-span-5 flex flex-col gap-4">
                            <label class="block text-sm font-semibold text-slate-700">Foto Menu</label>
                            <div @click="document.getElementById('fileInput').click()" class="relative w-full aspect-square rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-orange-50 transition-all cursor-pointer flex flex-col items-center justify-center group">
                                <input type="file" id="fileInput" class="hidden" accept="image/*" @change="fileChosen">
                                <div x-show="!imgPreview" class="text-center p-6">
                                    <p class="text-sm text-slate-700">Klik upload gambar</p>
                                </div>
                                <img x-show="imgPreview" :src="imgPreview" class="absolute inset-0 w-full h-full object-cover">
                            </div>
                        </div>

                        <div class="lg:col-span-7 space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Menu</label>
                                <input x-model="form.name" type="text" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-primary-500 outline-none" placeholder="Contoh: Ayam Bakar">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                                <textarea x-model="form.desc" rows="3" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-primary-500 outline-none resize-none"></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Harga</label>
                                    <input x-model="form.price" type="number" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-primary-500 outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Diskon (%)</label>
                                    <input x-model="form.promo" type="number" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-primary-500 outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="px-8 py-6 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                <button @click="showModal = false" class="px-6 py-2.5 rounded-xl text-slate-600 hover:bg-gray-200 transition">Batal</button>
                <button @click="saveData" class="px-6 py-2.5 rounded-xl bg-primary-600 text-white font-bold hover:bg-primary-700 transition" x-text="modalMode === 'edit' ? 'Simpan Perubahan' : 'Simpan Menu'"></button>
            </div>
        </div>
    </div>

</div>

@push('scripts')
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
            imgPreview: null,
            form: { id: null, name: '', desc: '', price: '', promo: '', isInactive: false, image: '' },
            items: [
                { id: 1, name: 'Ayam Goreng Kremes', price: 90000, promo: true, desc: 'Ayam kampung yang dimarinasi dengan bumbu tradisional.', image: '{{ asset("storage/images/ayam_goreng_kremes.png") }}' },
                { id: 2, name: 'Ayam Bakar Kecap', price: 85000, promo: true, desc: 'Ayam kampung dibakar dengan olesan bumbu kecap manis.', image: '{{ asset("storage/images/ayam_kampung_bakar_kecap.png") }}' },
            ],
            openModal(item = null) {
                this.showModal = true;
                if (item) {
                    this.modalMode = 'edit';
                    this.form = { ...item, isInactive: !item.isActive }; 
                    this.imgPreview = item.image;
                } else {
                    this.modalMode = 'add';
                    this.form = { id: null, name: '', desc: '', price: '', promo: '', isInactive: false, image: '' };
                    this.imgPreview = null;
                }
            },
            fileChosen(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => { this.imgPreview = e.target.result; }
                    reader.readAsDataURL(file);
                }
            },
            saveData() {
                alert(this.modalMode === 'edit' ? 'Perubahan Disimpan!' : 'Menu Baru Ditambahkan!');
                this.showModal = false;
            },
            get filteredData() {
                let data = this.items.filter(item => {
                    return item.name.toLowerCase().includes(this.search.toLowerCase()) || 
                        item.desc.toLowerCase().includes(this.search.toLowerCase());
                });
                if (this.sortCol && this.sortAsc !== null) {
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
            get totalPages() { return Math.ceil(this.filteredData.length / this.itemsPerPage); },
            get paginatedData() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                const end = start + this.itemsPerPage;
                return this.filteredData.slice(start, end);
            },
            nextPage() { if (this.currentPage < this.totalPages) this.currentPage++; },
            prevPage() { if (this.currentPage > 1) this.currentPage--; },
            goToPage(page) { this.currentPage = page; },
            sortBy(col) {
                if (this.sortCol === col) {
                    if (this.sortAsc === true) this.sortAsc = false;
                    else if (this.sortAsc === false) { this.sortAsc = null; this.sortCol = null; }
                } else {
                    this.sortCol = col; this.sortAsc = true;
                }
                this.currentPage = 1;
            }
        }
    }

    function deleteCard(elementId) {
        if(confirm('Apakah Anda yakin ingin menghapus menu ini?')) {
            alert('Menu ' + elementId + ' dihapus (simulasi).');
        }
    }
</script>
@endpush
@endsection
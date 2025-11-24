@extends('layouts.admin')

@section('title', 'Manajemen Menu')
@section('page_title', 'Daftar Menu')

@section('content')

<div x-data="menuManager()">

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 shadow-sm flex items-start gap-3">
            <svg class="w-6 h-6 flex-shrink-0 text-red-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                <h3 class="font-bold text-lg mb-1">Gagal Menyimpan Menu!</h3>
                <ul class="list-disc list-inside text-sm opacity-90">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Menu</h1>
            <p class="text-slate-500 mt-1">Kelola daftar menu katering Anda di sini.</p>
        </div>
        
        <button @click="openModal('add')" 
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
                    {{-- PERBAIKAN: Menggunakan variabel $total_promo dari Controller --}}
                    <h3 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $total_promo }} <span class="text-lg text-slate-400 font-normal">Item</span></h3>
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
                <input x-model="search" type="text" class="w-full py-2.5 pl-10 pr-4 text-sm text-slate-700 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-100 transition-all" placeholder="Cari menu ayam...">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-slate-500 font-semibold select-none">
                        <th class="px-6 py-4 w-16 text-center">#</th>
                        <th class="px-6 py-4 w-32">Gambar</th>
                        <th class="px-6 py-4 cursor-pointer hover:bg-gray-100" @click="sortBy('nama_menu')">Detail Menu</th>
                        <th class="px-6 py-4 cursor-pointer hover:bg-gray-100" @click="sortBy('harga')">Harga</th>
                        <th class="px-6 py-4 text-center cursor-pointer hover:bg-gray-100" @click="sortBy('promo')">Promo</th>
                        <th class="px-6 py-4 text-center">Status</th> <th class="px-6 py-4 w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100">
                    <template x-for="(item, index) in paginatedData" :key="item.id">
                        <tr class="hover:bg-gray-50/80 transition-colors group" :class="item.is_tersedia == 0 ? 'bg-gray-50 opacity-75' : ''">
                            
                            <td class="px-6 py-4 text-center text-slate-400 font-medium align-top pt-8" x-text="(currentPage - 1) * itemsPerPage + index + 1"></td>
                            
                            <td class="px-6 py-4 align-top">
                                <div class="relative w-24 h-24 rounded-xl overflow-hidden bg-gray-200 shadow-sm border border-gray-100">
                                    <img :src="item.gambar ? '{{ asset('storage') }}/' + item.gambar : 'https://placehold.co/150?text=No+Img'" class="w-full h-full object-cover">
                                </div>
                            </td>

                            <td class="px-6 py-4 align-top pt-5">
                                <div class="flex flex-col gap-1">
                                    <span class="font-bold text-slate-800 text-base" x-text="item.nama_menu"></span>
                                    <p class="text-sm text-slate-500 line-clamp-2" x-text="item.deskripsi"></p>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap align-top pt-5">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-700" x-text="'Rp ' + parseInt(item.harga).toLocaleString('id-ID')"></span>
                                    <span x-show="item.promo" class="text-xs text-slate-400 line-through" 
                                          x-text="'Rp ' + (item.harga * 100 / (100 - item.promo)).toLocaleString('id-ID')"></span>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-center align-top pt-5">
                                <div x-show="item.promo > 0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700 border border-green-200">
                                        <span x-text="item.promo + '%'"></span>
                                    </span>
                                </div>
                                <div x-show="!item.promo || item.promo == 0">
                                    <span class="text-slate-400 text-xs">-</span>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-center align-top pt-5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border"
                                    :class="item.is_tersedia == 1 ? 'bg-blue-50 text-blue-700 border-blue-100' : 'bg-red-50 text-red-700 border-red-100'">
                                    <span x-text="item.is_tersedia == 1 ? 'Tersedia' : 'Habis'"></span>
                                </span>
                            </td>

                            <td class="px-6 py-4 align-top pt-5">
                                <div class="flex items-center justify-center gap-2">
                                    <button @click="openModal('edit', item)" class="p-2 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all border border-transparent hover:border-blue-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    
                                    <form :action="'{{ url('admin/menu') }}/' + item.id" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all border border-transparent hover:border-red-100">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <tr x-show="paginatedData.length === 0">
                        <td colspan="7" class="p-8 text-center text-slate-500">Tidak ada data menu.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-5 border-t border-gray-100 bg-white flex flex-col sm:flex-row items-center justify-between gap-4" x-show="filteredData.length > 0">
            <p class="text-sm text-slate-500">Menampilkan <span class="font-bold" x-text="((currentPage - 1) * itemsPerPage) + 1"></span> - <span class="font-bold" x-text="Math.min(currentPage * itemsPerPage, filteredData.length)"></span> dari <span class="font-bold" x-text="filteredData.length"></span> Menu</p>
            <div class="flex items-center gap-1">
                <button @click="prevPage()" :disabled="currentPage === 1" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-100 disabled:opacity-50">Prev</button>
                <button @click="nextPage()" :disabled="currentPage === totalPages" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-100 disabled:opacity-50">Next</button>
            </div>
        </div>
    </div>

    <div x-show="showModal" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="showModal = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl overflow-hidden border border-white/20 max-h-[90vh] flex flex-col">
            
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <div>
                    <h2 class="text-xl font-bold text-slate-800" x-text="modalMode === 'edit' ? 'Edit Menu' : 'Tambah Menu Baru'"></h2>
                    <p class="text-sm text-slate-500">Kelola detail menu katering.</p>
                </div>
                <button @click="showModal = false" class="text-slate-400 hover:text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-8 overflow-y-auto custom-scrollbar">
                <form :action="formAction" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" :value="modalMode === 'edit' ? 'PUT' : 'POST'">

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <div class="lg:col-span-5 flex flex-col gap-4">
                            <label class="block text-sm font-semibold text-slate-700">Foto Menu</label>
                            <div @click="document.getElementById('fileInput').click()" class="relative w-full aspect-square rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-orange-50 transition-all cursor-pointer flex flex-col items-center justify-center group">
                                
                                <input type="file" 
                                    name="gambar" 
                                    id="fileInput" 
                                    accept="image/png, image/jpeg, image/jpg" 
                                    class="absolute inset-0 z-20 w-full h-full opacity-0 cursor-pointer" 
                                    @change="fileChosen" 
                                    :required="modalMode === 'add'">
                                
                                </div>
                            @error('gambar')
                                <p class="text-xs text-red-500 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="lg:col-span-7 space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Menu</label>
                                <input x-model="form.nama_menu" type="text" name="nama_menu" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500 transition-all" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                                <textarea x-model="form.deskripsi" name="deskripsi" rows="2" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500 resize-none"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-5 items-start">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Harga Asli</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-medium">Rp</span>
                                        <input x-model.number="form.price" 
                                               type="number" 
                                               name="harga" 
                                               class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500/50 font-semibold text-slate-800" 
                                               placeholder="0" required>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="flex items-center justify-between mb-2 h-6">
                                        <label class="block text-sm font-semibold text-slate-700">Diskon?</label>
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" x-model="form.hasPromo">
                                            <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
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
                                    
                                    <div x-show="!form.hasPromo" class="py-3">
                                        <span class="text-xs text-slate-400 italic">Harga normal (tanpa potongan)</span>
                                    </div>
                                </div>
                            </div>

                            <div x-show="form.hasPromo && form.price > 0 && form.promo > 0" 
                                 x-transition 
                                 class="mt-4 p-4 bg-blue-50 border border-blue-100 rounded-xl space-y-2">
                                
                                <h4 class="text-xs font-bold text-blue-800 uppercase tracking-wider mb-2">Simulasi Harga</h4>
                                
                                <div class="flex justify-between text-sm text-slate-600">
                                    <span>Harga Awal:</span>
                                    <span x-text="'Rp ' + (form.price || 0).toLocaleString('id-ID')"></span>
                                </div>
                                
                                <div class="flex justify-between text-sm text-red-500">
                                    <span>Potongan (<span x-text="form.promo"></span>%):</span>
                                    <span x-text="'- Rp ' + Math.round(form.price * (form.promo / 100)).toLocaleString('id-ID')"></span>
                                </div>
                                
                                <div class="border-t border-blue-200 pt-2 mt-1 flex justify-between items-center">
                                    <span class="font-bold text-slate-800">Harga Akhir:</span>
                                    <span class="font-bold text-xl text-blue-700" 
                                          x-text="'Rp ' + Math.round(form.price - (form.price * (form.promo / 100))).toLocaleString('id-ID')"></span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-gray-50">
                        <button type="button" @click="showModal = false" class="px-6 py-2.5 rounded-xl text-slate-600 hover:bg-gray-100">Batal</button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-primary-600 text-white font-bold shadow-lg hover:bg-primary-700 transition-all">
                            <span x-text="modalMode === 'edit' ? 'Simpan Perubahan' : 'Simpan Menu'"></span>
                        </button>
                    </div>
                </form>
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
            formAction: '',
            
            items: @json($menus),
            
            form: { 
                id: null, 
                nama_menu: '', 
                deskripsi: '', 
                harga: '', 
                promo: '', 
                hasPromo: false, // Logic Toggle Diskon
                isInactive: false, // Logic Toggle Status
                imagePreview: '' 
            },

            openModal(mode, item = null) {
                this.modalMode = mode;
                this.showModal = true;
                document.getElementById('fileInput').value = '';

                if (mode === 'edit' && item) {
                    this.form = {
                        id: item.id,
                        nama_menu: item.nama_menu,
                        deskripsi: item.deskripsi,
                        harga: item.harga,
                        promo: item.promo,
                        hasPromo: item.promo > 0, // Cek jika promo ada isinya
                        isInactive: item.is_tersedia == 0, // Jika 0 berarti Inactive true
                        imagePreview: item.gambar ? '{{ asset("storage") }}/' + item.gambar : null
                    };
                    this.formAction = '{{ url("admin/menu") }}/' + item.id;
                } else {
                    this.form = { id: null, nama_menu: '', deskripsi: '', harga: '', promo: '', hasPromo: false, isInactive: false, imagePreview: '' };
                    this.formAction = '{{ route("admin.menu.store") }}';
                }
            },

            fileChosen(event) {
                const file = event.target.files[0];
                if (file) {
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                    if (!validTypes.includes(file.type)) {
                        alert('Format file tidak didukung! Harap upload gambar dengan format JPG atau PNG.');
                        event.target.value = ''; // Reset input file
                        this.form.imagePreview = ''; // Reset preview
                        return; // Hentikan proses
                    }

                    if (file.size > 10 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar! Maksimal 10MB.');
                        event.target.value = '';
                        this.form.imagePreview = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = (e) => { this.form.imagePreview = e.target.result; }
                    reader.readAsDataURL(file);
                }
            },

            get filteredData() {
                return this.items.filter(item => item.nama_menu.toLowerCase().includes(this.search.toLowerCase()));
            },
            get paginatedData() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                return this.filteredData.slice(start, start + this.itemsPerPage);
            },
            get totalPages() { return Math.ceil(this.filteredData.length / this.itemsPerPage); },
            nextPage() { if (this.currentPage < this.totalPages) this.currentPage++; },
            prevPage() { if (this.currentPage > 1) this.currentPage--; },
            goToPage(page) { this.currentPage = page; },
            sortBy(col) { /* Logic sort */ }
        }
    }
</script>
@endpush
@endsection
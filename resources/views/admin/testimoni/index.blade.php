@extends('layouts.admin')

@section('title', 'Manajemen Testimoni')
@section('page_title', 'Testimoni')

@section('content')
<div x-data="testimoniManager()">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Testimoni</h1>
            <p class="text-slate-500 mt-1">Kelola screenshot testimoni pelanggan.</p>
        </div>
        
        <button @click="openModal('add')" 
                class="group relative inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-500 text-white text-sm font-semibold rounded-xl shadow-lg shadow-orange-200 hover:bg-primary-600 hover:-translate-y-0.5 transition-all duration-300 focus:ring-4 focus:ring-primary-100 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Testimoni
        </button>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 text-green-700 flex items-center gap-3 fade-in-up">
        <i class="bi bi-check-circle-fill text-xl"></i>
        <p class="font-medium">{{ session('success') }}</p>
    </div>
    @endif

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden min-h-[400px]">
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                <template x-for="item in paginatedData" :key="item.id">
                    <div class="group relative flex flex-col gap-3 p-3 bg-white rounded-2xl border border-gray-100 hover:border-orange-200 hover:shadow-lg transition-all duration-300">
                        
                        <div class="relative w-full aspect-[9/16] bg-gray-50 rounded-xl overflow-hidden">
                            <img :src="item.foto_ss ? '{{ asset('storage') }}/' + item.foto_ss : 'https://placehold.co/450x800/png?text=No+Image'" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <p class="text-xs text-orange-300 font-medium uppercase tracking-wider mb-1">Judul Testimoni</p>
                                <h3 class="font-bold text-lg leading-tight truncate" x-text="item.title || 'Tanpa Judul'"></h3>
                            </div>
                        </div>

                        <div class="px-1">
                            <p class="text-xs text-slate-400 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span x-text="item.username"></span>
                            </p>
                            <!-- <p class="text-xs text-slate-500 mt-1 line-clamp-2" x-text="item.message || 'Tidak ada keterangan'"></p> -->
                        </div>

                        <div class="flex items-center gap-2 mt-auto pt-2 border-t border-gray-50">
                            <button @click="openModal('edit', item)" class="flex-1 py-2 text-xs font-bold text-slate-600 bg-gray-50 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors">
                                Edit
                            </button>
                            
                            <form :action="'{{ url('admin/testimoni') }}/' + item.id" method="POST" onsubmit="return confirm('Hapus testimoni ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>

                    </div>
                </template>

                <div x-show="items.length === 0" class="col-span-full flex flex-col items-center justify-center py-20 text-gray-400">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p>Belum ada testimoni.</p>
                </div>
            </div>
        </div>

        <div class="p-5 border-t border-gray-100 bg-gray-50 flex items-center justify-between" x-show="filteredData.length > 0">
            <p class="text-sm text-slate-500">Halaman <span class="font-bold" x-text="currentPage"></span> dari <span x-text="totalPages"></span></p>
            <div class="flex gap-2">
                <button @click="prevPage()" :disabled="currentPage === 1" class="px-3 py-1.5 rounded-lg border bg-white text-sm disabled:opacity-50">Prev</button>
                <button @click="nextPage()" :disabled="currentPage === totalPages" class="px-3 py-1.5 rounded-lg border bg-white text-sm disabled:opacity-50">Next</button>
            </div>
        </div>
    </div>

    <div x-show="showModal" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="showModal = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-sm overflow-hidden border border-white/20 flex flex-col max-h-[90vh]">
            
            <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h2 class="text-lg font-bold text-slate-800" x-text="modalMode === 'add' ? 'Tambah Testimoni' : 'Edit Testimoni'"></h2>
                <button @click="showModal = false" class="text-slate-400 hover:text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="p-6 overflow-y-auto custom-scrollbar">
                <form :action="formAction" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" :value="modalMode === 'edit' ? 'PUT' : 'POST'">
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Testimoni (Contoh: Testi 1)</label>
                        <input type="text" name="title" x-model="formData.title" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500" required placeholder="Masukkan nama/judul testi...">
                    </div>

                    <div class="mx-auto max-w-[200px] relative group mb-4">
                        <label class="block text-sm font-semibold text-slate-700 mb-2 text-center">Screenshot Chat</label>
                        <div class="relative w-full aspect-[9/16] rounded-2xl border-2 overflow-hidden flex flex-col justify-center items-center transition-all duration-300"
                            :class="formData.imagePreview ? 'border-solid border-gray-200 bg-white' : 'border-dashed border-gray-300 bg-gray-50 hover:border-orange-300'">
                            
                            <input type="file" name="foto_ss" id="image-input" accept="image/*" 
                                   class="absolute inset-0 z-20 w-full h-full opacity-0 cursor-pointer" 
                                   @change="handleFileUpload($event)" :required="modalMode === 'add'">

                            <div x-show="!formData.imagePreview" class="absolute inset-0 z-10 flex flex-col items-center justify-center p-4 text-center pointer-events-none">
                                <div class="mb-2 text-orange-500"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                                <p class="text-xs font-bold text-gray-600">Upload Screenshot</p>
                            </div>

                            <img x-show="formData.imagePreview" :src="formData.imagePreview" class="absolute inset-0 z-10 w-full h-full object-cover bg-white">
                            
                            <div x-show="formData.imagePreview" class="absolute inset-0 z-15 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                <p class="text-xs font-bold text-white bg-black/50 px-3 py-1 rounded-full">Ganti Foto</p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="mb-4">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Keterangan (Opsional)</label>
                        <textarea name="message" x-model="formData.message" rows="3" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Pesan testimoni..."></textarea>
                    </div> -->

                    <div class="flex gap-3 pt-2">
                        <button type="button" @click="showModal = false" class="flex-1 py-2.5 rounded-xl text-slate-600 bg-gray-100 hover:bg-gray-200 font-medium transition">Batal</button>
                        <button type="submit" class="flex-1 py-2.5 rounded-xl bg-orange-600 text-white font-bold shadow-lg shadow-orange-200 hover:bg-orange-700 hover:-translate-y-0.5 transition-all">Simpan</button>
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
            itemsPerPage: 4,
            showModal: false,
            modalMode: 'add',
            formAction: '',
            
            // DATA DATABASE
            items: @json($testimonials),
            
            formData: { id: null, title: '', message: '', imagePreview: '' },

            openModal(mode, item = null) {
                this.modalMode = mode;
                this.showModal = true;
                
                const inputElement = document.getElementById('image-input');
                if(inputElement) inputElement.value = '';

                if (mode === 'edit' && item) {
                    this.formData = {
                        id: item.id,
                        title: item.title,   // Load title
                        message: item.message,
                        imagePreview: item.foto_ss ? '{{ asset("storage") }}/' + item.foto_ss : null
                    };
                    this.formAction = '{{ url("admin/testimoni") }}/' + item.id;
                } else {
                    this.formData = { id: null, title: '', message: '', imagePreview: '' };
                    this.formAction = '{{ route("admin.testimoni.store") }}';
                }
            },

            handleFileUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => { this.formData.imagePreview = e.target.result; };
                    reader.readAsDataURL(file);
                }
            },

            get filteredData() {
                // Filter berdasarkan title
                return this.items.filter(item => {
                    const title = item.title ? item.title.toLowerCase() : '';
                    return title.includes(this.search.toLowerCase());
                });
            },
            get paginatedData() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                return this.filteredData.slice(start, start + this.itemsPerPage);
            },
            get totalPages() { return Math.ceil(this.filteredData.length / this.itemsPerPage); },
            nextPage() { if (this.currentPage < this.totalPages) this.currentPage++; },
            prevPage() { if (this.currentPage > 1) this.currentPage--; }
        }
    }
</script>
@endpush
@extends('layouts.admin')

@section('title', 'Manajemen FAQ')
@section('page_title', 'Daftar FAQ')

@section('content')
<div x-data="faqManager()">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen FAQ</h1>
            <p class="text-slate-500 mt-1">Pertanyaan yang sering diajukan pelanggan.</p>
        </div>
        
        <button @click="openModal('add')" 
                class="group relative inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-orange-200 hover:bg-primary-700 hover:-translate-y-0.5 transition-all duration-300 focus:ring-4 focus:ring-primary-100 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah Pertanyaan
        </button>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 text-green-700 flex items-center gap-3">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-50 bg-gray-50/50">
            <div class="relative w-full sm:w-96">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input x-model="search" type="text" class="w-full py-2.5 pl-10 pr-4 text-sm text-slate-700 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 transition-all" placeholder="Cari pertanyaan...">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-slate-500 font-semibold select-none">
                        <th class="px-6 py-4 w-16 text-center">#</th>
                        <th class="px-6 py-4 w-1/3">Pertanyaan (Q)</th>
                        <th class="px-6 py-4">Jawaban (A)</th>
                        <th class="px-6 py-4 w-32 text-center">Oleh</th> {{-- Kolom Username --}}
                        <th class="px-6 py-4 w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <template x-for="(item, index) in paginatedData" :key="item.id">
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 text-center text-slate-400 font-medium" x-text="(currentPage - 1) * itemsPerPage + index + 1"></td>
                            
                            {{-- Desain Q Tetap Dipertahankan --}}
                            <td class="px-6 py-4 align-top">
                                <div class="flex gap-3">
                                    <span class="text-primary-500 font-bold">Q:</span>
                                    <span class="font-bold text-slate-800 text-sm leading-relaxed" x-text="item.pertanyaan"></span>
                                </div>
                            </td>

                            {{-- Desain A Tetap Dipertahankan --}}
                            <td class="px-6 py-4 align-top">
                                <div class="flex gap-3">
                                    <span class="text-green-500 font-bold">A:</span>
                                    <p class="text-slate-600 text-sm leading-relaxed text-justify" x-text="item.jawaban"></p>
                                </div>
                            </td>

                            {{-- Kolom Username --}}
                            <td class="px-6 py-4 align-top text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                    <span x-text="item.username || '-'"></span>
                                </span>
                            </td>

                            <td class="px-6 py-4 text-center align-top">
                                <div class="flex items-center justify-center gap-2">
                                    <button @click="openModal('edit', item)" class="p-2 text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    
                                    <form :action="'{{ url('admin/faq') }}/' + item.id" method="POST" onsubmit="return confirm('Yakin ingin menghapus FAQ ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <tr x-show="filteredData.length === 0">
                        <td colspan="5" class="p-8 text-center text-slate-500">Belum ada data FAQ.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-5 border-t border-gray-100 bg-white flex flex-col sm:flex-row items-center justify-between gap-4" x-show="filteredData.length > 0">
            <p class="text-sm text-slate-500">Menampilkan <span class="font-bold" x-text="((currentPage - 1) * itemsPerPage) + 1"></span> - <span class="font-bold" x-text="Math.min(currentPage * itemsPerPage, filteredData.length)"></span> dari <span class="font-bold" x-text="filteredData.length"></span> data</p>
            <div class="flex items-center gap-1">
                <button @click="prevPage()" :disabled="currentPage === 1" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-50 disabled:opacity-50">Prev</button>
                <button @click="nextPage()" :disabled="currentPage === totalPages" class="px-3 py-1 rounded-lg border border-gray-200 text-slate-500 text-sm hover:bg-gray-50 disabled:opacity-50">Next</button>
            </div>
        </div>
    </div>

    {{-- MODAL FORM --}}
    <div x-show="showModal" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="showModal = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h2 class="text-xl font-bold text-slate-800" x-text="modalMode === 'edit' ? 'Edit FAQ' : 'Tambah FAQ Baru'"></h2>
                <button @click="showModal = false" class="text-slate-400 hover:text-red-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            
            <div class="p-8 overflow-y-auto custom-scrollbar">
                <form :action="formAction" method="POST" id="faqForm">
                    @csrf
                    <input type="hidden" name="_method" :value="modalMode === 'edit' ? 'PUT' : 'POST'">
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Pertanyaan</label>
                            <input x-model="form.pertanyaan" name="pertanyaan" type="text" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-primary-500 transition-all font-semibold text-slate-800" placeholder="Contoh: Bagaimana cara memesan?" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Jawaban</label>
                            <textarea x-model="form.jawaban" name="jawaban" rows="5" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-primary-500 transition-all resize-none leading-relaxed" placeholder="Jelaskan jawabannya di sini..." required></textarea>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="px-8 py-6 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
                <button @click="showModal = false" class="px-6 py-2.5 rounded-xl text-slate-600 hover:bg-gray-200">Batal</button>
                <button onclick="document.getElementById('faqForm').submit()" class="px-6 py-2.5 rounded-xl bg-primary-600 text-white font-bold hover:bg-primary-700 transition" x-text="modalMode === 'edit' ? 'Simpan Perubahan' : 'Simpan FAQ'"> </button>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function faqManager() {
        return {
            search: '',
            currentPage: 1,
            itemsPerPage: 5,
            showModal: false,
            modalMode: 'add',
            formAction: '',
            form: { id: null, pertanyaan: '', jawaban: '' },
            
            // DATA DARI DATABASE
            items: @json($faqs),

            openModal(mode, item = null) {
                this.showModal = true;
                this.modalMode = mode;
                
                if (mode === 'edit' && item) {
                    this.form = { 
                        id: item.id, 
                        pertanyaan: item.pertanyaan, 
                        jawaban: item.jawaban 
                    };
                    this.formAction = '{{ url("admin/faq") }}/' + item.id;
                } else {
                    this.form = { id: null, pertanyaan: '', jawaban: '' };
                    this.formAction = '{{ route("admin.faq.store") }}';
                }
            },

            get filteredData() {
                return this.items.filter(i => 
                    i.pertanyaan.toLowerCase().includes(this.search.toLowerCase()) || 
                    i.jawaban.toLowerCase().includes(this.search.toLowerCase())
                );
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
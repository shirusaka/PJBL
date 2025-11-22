@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Dashboard Admin</h2>
    <p>Selamat datang, {{ Session::get('nama') }}!</p>

    <hr>

    <h4>Kelola Konten Website</h4>

    <!-- Tombol buka modal -->
    <button class="btn btn-success btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#modalTestimoni">
        Testimoni
    </button>

    <button class="btn btn-success btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#modalFAQ">
        FAQ
    </button>

    <button class="btn btn-success btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#modalMenu">
        Menu
    </button>
<!-- 
    <a href="{{ route('admin.faq.index') }}" class="btn btn-warning btn-sm">Kelola FAQ</a> -->

    <hr>

    <!-- ===================== -->
    <!--       MODAL           -->
    <!-- ===================== -->

    <!-- Modal Testi -->
<!-- Modal Tambah Testimoni -->
<div class="modal fade" id="modalTambahTestimoni" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formTestimoni" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Foto Screenshot</label>
                        <input type="file" name="foto_ss" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" form="formTestimoni" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

    
    <!-- Modal FAQ -->
    <div class="modal fade" id="modalFAQ" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title">Tes2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body" id="modalFAQContent">
                    Konten?
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Modal Testi -->
    <div class="modal fade" id="modalMenu" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title">Tes3</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body" id="modalMenuContent">
                    Konten?
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h4>Statistik</h4>
    <p>Total Menu: {{ $total_menu ?? 0 }}</p>
    <p>Total Admin: {{ $total_admin ?? 0 }}</p>

</div>
@endsection


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    // === TESTIMONI ===
    let modalTesti = document.getElementById('modalTestimoni');
    modalTesti.addEventListener('shown.bs.modal', function () {
        fetch("{{ route('admin.testimoni.index') }}")
            .then(res => res.text())
            .then(html => {
                document.getElementById('modalTestimoniContent').innerHTML = html;
            });
    });

    // === FAQ ===
    let modalFAQ = document.getElementById('modalFAQ');
    modalFAQ.addEventListener('shown.bs.modal', function () {
        fetch("{{ route('admin.faq.index') }}")
            .then(res => res.text())
            .then(html => {
                document.getElementById('modalFAQContent').innerHTML = html;
            });
    });

    // === MENU ===
    let modalMenu = document.getElementById('modalMenu');
    modalMenu.addEventListener('shown.bs.modal', function () {
        fetch("{{ route('admin.menu.index') }}")
            .then(res => res.text())
            .then(html => {
                document.getElementById('modalMenuContent').innerHTML = html;
            });
    });

});
</script>
@endpush

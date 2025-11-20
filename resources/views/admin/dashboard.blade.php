@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang, {{ Session::get('nama') }}! 🎉</h5>
                        <p class="mb-4">
                            Ini adalah halaman admin untuk mengelola konten website Ayam Kabogor.
                        </p>
                        <a href="{{ route('menus.index') }}" class="btn btn-sm btn-outline-primary">Kelola Menu</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-semibold d-block mb-1">Total Menu</span>
                        <h3 class="card-title mb-2">{{ $total_menu ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-semibold d-block mb-1">Total Admin</span>
                        <h3 class="card-title mb-2">{{ $total_admin ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Daftar Menu Makanan</h5>
        <a href="{{ route('menus.create') }}" class="btn btn-primary">
            <span class="tf-icons bx bx-plus"></span> Tambah Menu
        </a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($menus as $menu)
                <tr>
                    <td>
                        @if($menu->gambar)
                            <img src="{{ asset('assets/img/menu/'.$menu->gambar) }}" width="50" class="rounded">
                        @else
                            <span class="badge bg-label-secondary">No Image</span>
                        @endif
                    </td>
                    <td><strong>{{ $menu->nama }}</strong></td>
                    <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($menu->is_tersedia)
                            <span class="badge bg-label-success">Tersedia</span>
                        @else
                            <span class="badge bg-label-danger">Habis</span>
                        @endif
                    </td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda yakin menghapus data ini?');" action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-info"><i class="bx bx-edit-alt"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data menu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
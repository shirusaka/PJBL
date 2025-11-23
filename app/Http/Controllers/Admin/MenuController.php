<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;

class MenuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'deskripsi' => 'nullable|string',
            'promo'     => 'nullable|numeric|min:0|max:100',
        ]);

        // === LOGIKA HITUNG HARGA DISKON ===
        $harga_final = $request->harga; // Ambil harga asli dulu

        // Cek apakah ada promo dan nilainya lebih dari 0
        if ($request->has('promo') && $request->promo > 0) {
            // Rumus: Harga Asli - (Harga Asli * Persen / 100)
            $potongan = $request->harga * ($request->promo / 100);
            $harga_final = $request->harga - $potongan;
        }
        // ==================================

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('menu', 'public');
        }

        Menu::create([
            'nama_menu'   => $request->nama_menu,
            'harga'       => $harga_final, // SIMPAN HARGA YANG SUDAH DIPOTONG
            'gambar'      => $path,
            'deskripsi'   => $request->deskripsi,
            'is_tersedia' => $request->has('is_inactive') ? 0 : 1,
            'promo'       => $request->promo > 0 ? $request->promo : null,
            'username'    => Auth::user()->name,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Menu Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'promo'     => 'nullable|numeric|min:0|max:100',
        ]);

        $menu = Menu::findOrFail($id);

        // === LOGIKA HITUNG HARGA DISKON (UPDATE) ===
        $harga_final = $request->harga;

        if ($request->has('promo') && $request->promo > 0) {
            $potongan = $request->harga * ($request->promo / 100);
            $harga_final = $request->harga - $potongan;
        }
        // ===========================================

        $data = [
            'nama_menu'   => $request->nama_menu,
            'harga'       => $harga_final, // UPDATE HARGA JADI YANG SUDAH DIPOTONG
            'deskripsi'   => $request->deskripsi,
            'is_tersedia' => $request->has('is_inactive') ? 0 : 1,
            'promo'       => $request->promo > 0 ? $request->promo : null,
            'username'    => Auth::user()->name,
        ];

        if ($request->hasFile('gambar')) {
            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Menu Berhasil Di-update');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Menu Berhasil Dihapus');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;

class MenuController extends Controller
{
    // Menampilkan halaman dashboard admin (jika route mengarah ke sini)
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.dashboard', compact('menus'));
    }

    // Menyimpan menu baru
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:10240', // Maks 5MB
            'deskripsi' => 'nullable|string',
            'promo'     => 'nullable|numeric|min:0|max:100',
        ]);

        // 2. Hitung Harga Diskon (Jika ada promo)
        $harga_simpan = $request->harga;
        if ($request->has('promo') && $request->promo > 0) {
            $potongan = $request->harga * ($request->promo / 100);
            $harga_simpan = $request->harga - $potongan;
        }

        // 3. Upload Gambar
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('menu', 'public');
        }

        // 4. Simpan ke Database
        Menu::create([
            'nama_menu'   => $request->nama_menu,
            'harga'       => $harga_simpan, // Harga yang sudah dipotong diskon
            'gambar'      => $path,
            'deskripsi'   => $request->deskripsi,
            'promo' => $request->has('promo') ? 1 : null,
            'is_tersedia' => $request->has('is_inactive') ? 0 : 1,
            'username'    => Auth::user()->name ?? 'Admin',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Menu Berhasil Ditambahkan');
    }

    // Mengupdate menu
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'promo'     => 'nullable|numeric|min:0|max:100',
        ]);

        $menu = Menu::findOrFail($id);

        // Hitung ulang harga diskon jika ada perubahan
        $harga_simpan = $request->harga;
        if ($request->has('promo') && $request->promo > 0) {
            $potongan = $request->harga * ($request->promo / 100);
            $harga_simpan = $request->harga - $potongan;
        }

        $data = [
            'nama_menu'   => $request->nama_menu,
            'harga'       => $harga_simpan,
            'deskripsi'   => $request->deskripsi,
            'promo'       => $request->promo > 0 ? $request->promo : null,
            'is_tersedia' => $request->has('is_inactive') ? 0 : 1,
            'username'    => Auth::user()->name ?? 'Admin',
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }
            // Upload baru
            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Menu Berhasil Di-update');
    }

    // Menghapus menu
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
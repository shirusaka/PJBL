<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.dashboard', compact('menus'));
    }

    public function store(Request $request)
    {

        $messages = [
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'harga.required'     => 'Harga menu wajib diisi.',
            'gambar.required'    => 'Foto menu wajib diupload.',
            'gambar.image'       => 'File yang diupload harus berupa gambar.',
            'gambar.mimes'       => 'Format gambar salah! Harap gunakan format: JPEG, PNG, atau JPG.',
            'gambar.max'         => 'Ukuran gambar terlalu besar! Maksimal 10MB.',
        ];
        // 1. Validasi Input
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'deskripsi' => 'nullable|string',
            'promo'     => 'nullable|numeric|min:0|max:100',
        ], $messages);

        // Cek apakah input promo ada isinya. Jika ada, gunakan nilainya. Jika tidak, null.
        $nilai_promo = $request->filled('promo') ? $request->promo : null;

        // PERBAIKAN: Hapus logika perhitungan diskon di sini. 
        // Simpan harga asli ($request->harga) agar tidak terjadi double diskon di homepage.
        $harga_simpan = $request->harga;
        
        // 3. Upload Gambar
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('menu', 'public');
        }

        // 4. Simpan ke Database
        Menu::create([
            'nama_menu'   => $request->nama_menu,
            'harga'       => $harga_simpan, // Harga Asli disimpan
            'gambar'      => $path,
            'deskripsi'   => $request->deskripsi,
            'promo'       => $nilai_promo,
            'is_tersedia' => $request->has('is_inactive') ? 0 : 1,
            'username'    => Auth::user()->name ?? 'Admin',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Menu Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'harga.required'     => 'Harga menu wajib diisi.',
            'gambar.image'       => 'File yang diupload harus berupa gambar.',
            'gambar.mimes'       => 'Format gambar salah! Harap gunakan format: JPEG, PNG, atau JPG.',
            'gambar.max'         => 'Ukuran gambar terlalu besar! Maksimal 10MB.',
        ];

        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'promo'     => 'nullable|numeric|min:0|max:100',
        ], $messages);

        $menu = Menu::findOrFail($id);

        $nilai_promo = $request->filled('promo') ? $request->promo : null;

        // PERBAIKAN: Hapus logika perhitungan diskon ulang. Gunakan harga inputan user (Harga Asli).
        $harga_simpan = $request->harga;

        $data = [
            'nama_menu'   => $request->nama_menu,
            'harga'       => $harga_simpan, // Harga Asli disimpan
            'deskripsi'   => $request->deskripsi,
            'promo'       => $nilai_promo,
            'is_tersedia' => $request->has('is_inactive') ? 0 : 1,
            'username'    => Auth::user()->name ?? 'Admin',
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
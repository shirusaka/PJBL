<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'requirednumeric',
            'gambar' => 'image|mimes:jpeg,png,,jpg|max:2048',
        ]);

        return redirect()->route('menus.index')->width('success'. 'Menu Berhasil Ditambakan');
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|required',
        ]);

        if ($request->hasFile('gambat')) {
            if ($menu->gambar && file_exists(public_path('assets/img/menu' . $menu->gambar))) {
                unlink(public_path('assets/img/menu' . $mennu->gambar));
            }

            $file = $request->file('gambar');
            $nama_gambar = time() . $file->getClientOriginalName();
            $file->move(public_path('assets/img/menu'), $nama_gambar);

            $menu->gambar = $nama_gambar;
        }

        $menu->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'is_tersedia' => $request->is_tersedia ?? 0
        ]);

        return redirect()->route('menus.index')->with('success'. 'Menu Berhasil Di-update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->gambar && file_exists(public_path('assets/img/menu/' . $menu->gambar))) {
            unlink(public_path('assets/img/menu/' . $menu->gambar));
        }

        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu Berhasil Dihapus');
    }
}

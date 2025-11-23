<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Wajib Import Auth
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimoni::latest()->get();
        return view('admin.testimoni.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        // Validasi Foto Saja (Username otomatis dari Admin)
        $request->validate([
            'title' => 'required|string|max:255',
            'foto_ss' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('foto_ss')) {
            $imagePath = $request->file('foto_ss')->store('testimonials', 'public');
        }

        Testimoni::create([
            'title'    => $request->title,
            'username' => Auth::user()->name, // Otomatis ambil Nama Admin
            'foto_ss'  => $imagePath,
        ]);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi (Gambar nullable karena edit)
        $request->validate([
            'title' => 'required|string|max:255',
            'foto_ss' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        
        // Update Nama Admin (Siapa yang terakhir ngedit)
        $data = [
            'title' => $request->title,
            'username' => Auth::user()->name, 
        ];

        if ($request->hasFile('foto_ss')) {
            if ($testimoni->foto_ss && Storage::disk('public')->exists($testimoni->foto_ss)) {
                Storage::disk('public')->delete($testimoni->foto_ss);
            }
            $data['foto_ss'] = $request->file('foto_ss')->store('testimonials', 'public');
        }

        $testimoni->update($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->foto_ss && Storage::disk('public')->exists($testimoni->foto_ss)) {
            Storage::disk('public')->delete($testimoni->foto_ss);
        }

        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
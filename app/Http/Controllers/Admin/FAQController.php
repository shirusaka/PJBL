<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    public function index()
    {
        // Mengambil semua data FAQ terbaru
        $faqs = FAQ::latest()->get();
        return view('admin.FAQ.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        $data = $request->all();
        $data['username'] = Auth::user()->name;

        FAQ::create($data);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        // Cari data berdasarkan ID
        $faq = FAQ::findOrFail($id);
        
        // Update secara manual/eksplisit agar lebih aman & pasti
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->username = Auth::user()->username; // Update siapa yang ngedit
        
        // Simpan perubahan
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus');
    }
}
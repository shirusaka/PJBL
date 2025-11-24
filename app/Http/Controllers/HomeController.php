<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Testimoni;
use App\Models\FAQ;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_tersedia', 1)->latest()->get();

        $faqs = FAQ::latest()->get();

        $testimonials = Testimoni::latest()->get();

        return view('beranda', compact('menus', 'faqs', 'testimonials'));
    }
}

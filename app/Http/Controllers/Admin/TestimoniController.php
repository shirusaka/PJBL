<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimoni::all();
        return view('admin.testimoni.index', compact('testimonials'));
    }
}

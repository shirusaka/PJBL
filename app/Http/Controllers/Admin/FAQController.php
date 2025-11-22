<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FAQ;


class FAQController extends Controller
{
    public function index()
    {
        $faq = FAQ::all();
        return view('admin.faq.index', compact('faq'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Testimoni;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $total_menu = Menu::count();
        $menus = Menu::all();
        $testimonials = Testimoni::all();
        $total_admin = User::count();
        $total_promo = Menu::where('promo', '>', 0)->count();

        return view('admin.dashboard', compact('total_menu', 'total_admin', 'testimonials', 'menus', 'total_promo'));
    }
}

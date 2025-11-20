<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $total_menu = Menu::count();
        $total_admin = User::count();

        return view('admin.dashboard', compact('total_menu', 'total_admin'));
    }
}

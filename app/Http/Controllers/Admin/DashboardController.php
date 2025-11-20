<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Admin;


class DashboardController extends Controller
{
    public function index()
    {
        $products = [
            [
                "id" => 1,
                "name" => "Product 1",
                "price" => 28000,
            ],
            [
                "id" => 2,
                "name" => "Product 2",
                "price" => 1000,
            ],
            [
                "id" => 3,
                "name" => "Product 3",
                "price" => 46000,
            ],
        ];

        $total_menu = Menu::count();
        $total_admin = Admin::count();

        return view('admin.dashboard', compact('total_menu', 'total_admin'));
    }
}

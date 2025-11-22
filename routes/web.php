<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\TestimoniController;


// PUBLIC
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout']);

//ADMIN
Route::group(['prefix' => 'admin'], function() {
    // Route::resource('menus', MenuController::class);
});

// CRUD ADMIN
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Route::get('/dashboard', [DashboardController::class, 'index']);
    //MENU
    Route::resource('/menu', MenuController::class)->names('admin.menu');

    //TESTIMONI
    Route::resource('/testimoni', TestimoniController::class)->names('admin.testimoni');

    //FAQ
    Route::resource('/faq', FAQController::class)->names('admin.faq');
});

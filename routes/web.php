<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MenuController;

// PUBLIC
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout']);

//ADMIN
Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('menus', MenuController::class);
});

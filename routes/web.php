<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');


Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/admin/menu', function () {
    return view('admin.menu.admin_menu');
});

Route::get('/admin/transaksi', function () {
    return view('admin.transaksi.admin_transaksi');
});

// Contoh route dengan middleware auth dan admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // route admin lainnya...
});
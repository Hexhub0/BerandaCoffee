<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('app');
})->name('login');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin.dashboard');

Route::get('/admin_menu', function () {
    return view('admin.admin_menu');
})->name('admin.menu');

Route::get('/admin_transaksi', function () {
    return view('admin.admin_transaksi');
})->name('admin.transaksi');

Route::get('/admin', function () {
    return view('admin.admin', [
        'totalMenu' => 0,
        'todayOrders' => 0,
        'completedOrders' => 0,
        'pendingOrders' => 0,
    ]);
})->name('admin.dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';

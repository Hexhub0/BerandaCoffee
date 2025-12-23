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

Route::get('/order', function () {
    return view('order-history');
})->name('order history');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');


Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/admin/menu', function () {
    return view('admin.menu.admin_menu');
});

Route::get('/admin/transaksi', function () {
    return view('admin.transaksi.admin_transaksi');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    // Dashboard Admin
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.admin');
    
    // Manajemen User
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    
    // Tambahkan route admin lainnya di sini...
    
});

// ===== ROUTE UNTUK MENGUJI ROLE =====
Route::get('/check-role', function () {
    if (auth()->check()) {
        $user = auth()->user();
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'is_admin' => $user->role === 'admin'
        ]);
    }
    return response()->json(['message' => 'Not authenticated']);
})->middleware('auth');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan dashboard admin
     */
    public function admin()
    {
        return view('admin.admin');
    }
    
    /**
     * Tampilkan halaman manajemen user
     */
    public function users()
    {
        // Contoh: ambil semua user
        $users = \App\Models\User::all();
        return view('admin.users', compact('users'));
    }
    
    // Tambahkan method lainnya sesuai kebutuhan
}
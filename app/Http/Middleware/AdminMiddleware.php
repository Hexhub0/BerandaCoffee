<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Cek apakah user memiliki role admin
        if (Auth::user()->role !== 'admin') {
            // Jika bukan admin, redirect ke halaman home atau unauthorized
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses admin.');
        }
        
        return $next($request);
    }
}
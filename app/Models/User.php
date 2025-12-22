<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // TAMBAHKAN INI
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ===== TAMBAHKAN METHOD INI =====
    
    /**
     * Cek apakah user adalah admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    /**
     * Cek apakah user adalah user biasa
     */
    public function isUser()
    {
        return $this->role === 'user';
    }
}
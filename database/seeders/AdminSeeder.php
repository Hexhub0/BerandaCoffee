<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Super Admin',
            'email' => 'admin@berandacoffee.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
        
        User::create([
            'nama' => 'User Test',
            'email' => 'user@berandacoffee.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
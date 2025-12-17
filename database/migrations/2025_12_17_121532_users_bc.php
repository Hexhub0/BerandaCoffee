<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('users_bc', function (Blueprint $table) {
            $table->id('id_users');
            $table->string('nama_users', 50);
            $table->string('email_users', 50)->unique();
            $table->string('password_users', 255);
            $table->string('no_telp_users', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

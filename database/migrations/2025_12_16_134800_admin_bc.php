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
        schema::create('admin_bc', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('nama_admin', 50);
            $table->string('email_admin', 50)->unique();
            $table->string('password_admin', 255);
            $table->string('no_telp_admin', 15);
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

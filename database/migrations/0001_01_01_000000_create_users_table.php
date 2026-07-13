<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama', 150);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->text('alamat')->nullable();
            $table->enum('role', ['admin', 'anggota'])->default('anggota');
            $table->enum('status_aktif', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
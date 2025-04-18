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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir'); // Tambahkan tempat lahir
            $table->date('tanggal_lahir'); // Tambahkan tanggal lahir
            $table->string('NIP');
            $table->string(('golongan'));
            $table->string('jabatan');
            $table->string('pendidikan');
            $table->string('kompetensi');
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->text('publikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

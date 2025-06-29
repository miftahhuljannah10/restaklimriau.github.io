<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat', 64)->unique();
            $table->foreignId('klasifikasi_id')->constrained('klasifikasi_surat')->onDelete('restrict');
            $table->date('tanggal_surat');
            $table->string('perihal', 128);
            $table->string('tujuan', 128);
            $table->string('sifat', 32);
            $table->string('scanning')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};

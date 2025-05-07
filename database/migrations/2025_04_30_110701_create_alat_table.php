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
        Schema::create('alat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pos', 100)->nullable();
            $table->string('jenis_alat', 100)->nullable();
            $table->integer('kode_pos')->nullable();
            $table->string('nomor_pos', 100)->nullable();
            $table->double('lintang')->nullable();
            $table->double('bujur')->nullable();
            $table->integer('elevasi')->nullable();
            $table->string('desa', 200)->nullable();

            $table->foreignId('provinsi_id')->nullable()->constrained('provinsi')->nullOnDelete();
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupaten')->nullOnDelete();
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatan')->nullOnDelete();

            $table->string('kondisi_alat', 100)->nullable();
            $table->string('kepemilikan_alat', 200)->nullable();
            $table->string('nama_penanggungjawab', 100)->nullable();
            $table->string('jabatan', 200)->nullable();
            $table->string('pengiriman_data', 100)->nullable();
            $table->string('ketersediaan_data', 150)->nullable();
            $table->string('keterangan_alat', 255)->nullable();
            $table->string('inspeksi', 100)->nullable();
            $table->string('foto', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat');
    }
};

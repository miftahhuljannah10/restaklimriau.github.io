<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_produk', [
                'cuaca',
                'perubahan_iklim',
                'kualitas_udara',
                'informasi_iklim',
                'iklim_terapan'
            ])->index();
            $table->string('judul', 255);
            $table->text('isi')->nullable();
            $table->text('script')->nullable(); // Untuk embed code Tableau
            $table->string('penulis', 255)->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

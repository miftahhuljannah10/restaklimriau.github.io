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
        Schema::create('berita_artikel', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['berita', 'artikel'])->default('berita');
            $table->string('judul', 300);
            $table->text('isi');
            $table->foreignId('kategori_id')->constrained('kategori_berita_artikel');
            $table->string('penulis', 100)->default('Stasiun Klimatologi Riau');
            $table->timestamps();
            $table->softDeletes();
            // Kolom tambahan
            $table->string('slug')->unique();
            $table->boolean('featured')->default(false);
            $table->enum('status', ['draft', 'publish', 'archived'])->default('publish');

            // Indeks untuk pencarian
            // Tambahkan index untuk pencarian
            $table->index('judul');
            $table->index('kategori_id');
            $table->index('created_at');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_artikel');
    }
};

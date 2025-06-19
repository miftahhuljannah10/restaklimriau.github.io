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
        Schema::create('media_berita_artikel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berita_artikel_id')
                ->constrained('berita_artikel')
                ->onDelete('cascade');
            $table->string('media_url', 500);
            $table->enum('tipe', ['thumbnail', 'galeri', 'header'])->default('galeri');
            $table->string('caption', 255)->nullable(); // Optional caption for the media
            $table->string('alt_text', 255)->nullable(); // Optional alt text for accessibility
            $table->integer('urutan')->default(0); // Order of media items
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_berita_artikel');
    }
};

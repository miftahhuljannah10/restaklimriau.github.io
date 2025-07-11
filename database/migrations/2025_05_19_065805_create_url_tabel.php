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
        Schema::create('url_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->string('short_url')->unique();
            $table->enum('menu_type', ['nol_rupiah', 'survey']);
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_tabel');
    }
};

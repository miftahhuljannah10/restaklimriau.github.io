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
        Schema::create('media_buletin', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->text('edisi')->nullable();
            $table->string('image')->nullable();
            $table->string('link', 255)->nullable();
            $table->string('penulis', 100)->default('Stasiun Klimatologi Riau');          
            $table->enum('status', ['draft', 'published'])->default('draft');            // tanggal terbit buletin, nullable                 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_buletin');
    }
};

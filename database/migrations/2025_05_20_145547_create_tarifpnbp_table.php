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
        Schema::create('tarifpnbp', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tarif', 100)->nullable();
            $table->string('satuan', 50)->nullable();
            $table->string('jenis_tarif', 50)->nullable();
            $table->string('tarif', 50)->nullable();
            $table->string('waktu', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifpnbp');
    }
};

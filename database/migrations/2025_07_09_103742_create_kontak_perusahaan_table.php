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
        Schema::create('kontak_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // contoh: alamat, email, whatsapp, operasional_senin_kamis, operasional_jumat
            $table->text('value'); // isi kontak atau jam operasional
            $table->string('link')->nullable(); // untuk kontak yang punya link (mailto, wa.me, dsb)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak_perusahaan');
    }
};

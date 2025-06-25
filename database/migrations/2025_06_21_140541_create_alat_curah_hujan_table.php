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
        Schema::disableForeignKeyConstraints();
        Schema::create('alat_curah_hujan', function (Blueprint $table) {
            $table->string('nomor_pos')->primary();
            $table->integer('januari')->nullable();
            $table->integer('februari')->nullable();
            $table->integer('maret')->nullable();
            $table->integer('april')->nullable();
            $table->integer('mei')->nullable();
            $table->integer('juni')->nullable();
            $table->integer('juli')->nullable();
            $table->integer('agustus')->nullable();
            $table->integer('september')->nullable();
            $table->integer('oktober')->nullable();
            $table->integer('november')->nullable();
            $table->integer('desember')->nullable();
            $table->timestamps();


            $table->foreign('nomor_pos')
                ->references('nomor_pos')
                ->on('alat')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_curah_hujan');
    }
};

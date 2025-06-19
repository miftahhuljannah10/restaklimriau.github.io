<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hapus kolom id jika ada
        Schema::table('alat', function (Blueprint $table) {
            if (Schema::hasColumn('alat', 'id')) {
                $table->dropColumn('id');
            }
        });

        // Tambahkan primary key ke nomor_pos
        DB::statement('ALTER TABLE alat ADD PRIMARY KEY (nomor_pos)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus primary key dari nomor_pos dulu
        DB::statement('ALTER TABLE alat DROP PRIMARY KEY');

        // Tambahkan kembali kolom id
        Schema::table('alat', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement()->first();
        });

        // Jadikan id sebagai primary key
        DB::statement('ALTER TABLE alat ADD PRIMARY KEY (id)');
    }
};

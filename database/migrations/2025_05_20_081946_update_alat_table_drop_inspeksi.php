<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('alat', function (Blueprint $table) {
            // Karena id adalah primary key, harus dihapus pakai raw query setelah ini
            $table->dropColumn('inspeksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus primary key nomor_pos
        DB::statement('ALTER TABLE alat DROP PRIMARY KEY');

        // Tambahkan kolom id sebagai primary key auto increment
        Schema::table('alat', function (Blueprint $table) {
            $table->id()->first(); // tambahkan id sebagai kolom pertama
            $table->string('inspeksi', 100)->nullable();
        });

        // Jadikan id sebagai primary key kembali
        DB::statement('ALTER TABLE alat ADD PRIMARY KEY (id)');
    }
};

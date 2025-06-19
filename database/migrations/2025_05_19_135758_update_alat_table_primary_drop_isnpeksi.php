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
        // Hapus primary key id dan kolom id-nya serta kolom inspeksi
        Schema::table('alat', function (Blueprint $table) {
            // Karena id adalah primary key, harus dihapus pakai raw query setelah ini
            $table->dropColumn('inspeksi');
        });

        // Hapus primary key lama (id) dan kolom id
        DB::statement('ALTER TABLE alat DROP PRIMARY KEY');
        DB::statement('ALTER TABLE alat DROP COLUMN id');

        // Jadikan nomor_pos sebagai primary key baru
        DB::statement('ALTER TABLE alat ADD PRIMARY KEY (nomor_pos)');
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

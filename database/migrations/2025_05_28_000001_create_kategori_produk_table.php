<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 100);
            $table->string('slug', 100)->unique();
            $table->timestamps();
        });

        // Insert kategori default
        DB::table('kategori_produk')->insert([
            ['nama_kategori' => 'Agroklimat', 'slug' => 'agroklimat'],
            ['nama_kategori' => 'Iklim Dasarian', 'slug' => 'iklim-dasarian'],
            ['nama_kategori' => 'Hidrometeorologi', 'slug' => 'hidrometeorologi'],
            ['nama_kategori' => 'Perubahan Iklim', 'slug' => 'perubahan-iklim'],
            ['nama_kategori' => 'Cuaca Penerbangan', 'slug' => 'cuaca-penerbangan'],
            ['nama_kategori' => 'Kualitas Udara', 'slug' => 'kualitas-udara'],
            ['nama_kategori' => 'Multisektor', 'slug' => 'multisektor'],
            ['nama_kategori' => 'Cuaca Maritim', 'slug' => 'cuaca-maritim'],
            ['nama_kategori' => 'Proyeksi Iklim', 'slug' => 'proyeksi-iklim'],
            ['nama_kategori' => 'Potensi Energi Surya', 'slug' => 'potensi-energi-surya'],
            ['nama_kategori' => 'Normal Iklim Riau', 'slug' => 'normal-iklim-riau'],
            ['nama_kategori' => 'Prakiraan Curah Hujan', 'slug' => 'prakiraan-curah-hujan'],
            ['nama_kategori' => 'Dinamika Atmosfer dan Laut', 'slug' => 'dinamika-atmosfer-dan-laut'],
            ['nama_kategori' => 'Pengindraan Jauh', 'slug' => 'pengindraan-jauh'],
            ['nama_kategori' => 'Kebakaran Hutan dan Lahan', 'slug' => 'kebakaran-hutan-dan-lahan'],
            ['nama_kategori' => 'Infografis', 'slug' => 'infografis']
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_produk');
    }
};

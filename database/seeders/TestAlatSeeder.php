<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Alat;
use App\Models\AlatCurahHujan;

class TestAlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create test provinsi
        $provinsi = Provinsi::firstOrCreate(
            ['nama_provinsi' => 'Riau']
        );

        // Create test kabupaten
        $kabupaten = Kabupaten::firstOrCreate(
            ['nama_kabupaten' => 'Kampar', 'provinsi_id' => $provinsi->id]
        );

        // Create test kecamatan
        $kecamatan = Kecamatan::firstOrCreate(
            ['nama_kecamatan' => 'Bangkinang', 'kabupaten_id' => $kabupaten->id]
        );

        // Create test alat with proper relationships
        $alat1 = Alat::firstOrCreate(
            ['nomor_pos' => 'TEST001'],
            [
                'nama_pos' => 'Test Station Bangkinang',
                'jenis_alat' => 'PHK',
                'kode_pos' => 1001,
                'lintang' => 0.333277778,
                'bujur' => 101.0332778,
                'elevasi' => 25,
                'desa' => 'Bangkinang Kota',
                'provinsi_id' => $provinsi->id,
                'kabupaten_id' => $kabupaten->id,
                'kecamatan_id' => $kecamatan->id,
                'kondisi_alat' => 'Baik',
                'kepemilikan_alat' => 'BMKG',
                'nama_penanggungjawab' => 'John Doe',
                'jabatan' => 'Teknisi',
                'pengiriman_data' => 'Otomatis',
                'ketersediaan_data' => 'Tersedia',
                'keterangan_alat' => 'Alat berfungsi normal',
            ]
        );

        // Create another test alat
        $alat2 = Alat::firstOrCreate(
            ['nomor_pos' => 'TEST002'],
            [
                'nama_pos' => 'Test Station Kampar',
                'jenis_alat' => 'ARG',
                'kode_pos' => 1002,
                'lintang' => 0.350583333,
                'bujur' => 101.0898056,
                'elevasi' => 30,
                'desa' => 'Kampar Tengah',
                'provinsi_id' => $provinsi->id,
                'kabupaten_id' => $kabupaten->id,
                'kecamatan_id' => $kecamatan->id,
                'kondisi_alat' => 'Baik',
                'kepemilikan_alat' => 'BMKG',
                'nama_penanggungjawab' => 'Jane Smith',
                'jabatan' => 'Operator',
                'pengiriman_data' => 'Manual',
                'ketersediaan_data' => 'Tersedia',
                'keterangan_alat' => 'Alat maintenance rutin',
            ]
        );

        // Create rainfall data for TEST001
        AlatCurahHujan::firstOrCreate(
            ['nomor_pos' => 'TEST001'],
            [
                'januari' => 120,
                'februari' => 140,
                'maret' => 180,
                'april' => 200,
                'mei' => 160,
                'juni' => 100,
                'juli' => 80,
                'agustus' => 90,
                'september' => 110,
                'oktober' => 130,
                'november' => 150,
                'desember' => 170,
            ]
        );

        // Create rainfall data for TEST002
        AlatCurahHujan::firstOrCreate(
            ['nomor_pos' => 'TEST002'],
            [
                'januari' => 95,
                'februari' => 125,
                'maret' => 165,
                'april' => 185,
                'mei' => 145,
                'juni' => 85,
                'juli' => 65,
                'agustus' => 75,
                'september' => 95,
                'oktober' => 115,
                'november' => 135,
                'desember' => 155,
            ]
        );
    }
}

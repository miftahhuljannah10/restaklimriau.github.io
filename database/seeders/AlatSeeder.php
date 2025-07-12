<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alat;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for testing
        $alatData = [
            [
                'nama_pos' => 'SMPK Bangkinang',
                'jenis_alat' => 'PHK',
                'nomor_pos' => '14010101A',
                'lintang' => 0.333277778,
                'bujur' => 101.0332778,
                'elevasi' => 43,
                'desa' => 'Bangkinang',
                'kondisi_alat' => 'Baik',
                'kepemilikan_alat' => 'BMKG',
                'nama_penanggungjawab' => 'Yon Marlizon',
                'jabatan' => 'PNS',
                'pengiriman_data' => 'Aktif',
                'ketersediaan_data' => '2023 - Sekarang',
                'keterangan_alat' => 'Keran Rusak (Diatasi Dengan Botol Aqua)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pos' => 'Kampar',
                'jenis_alat' => 'PHK',
                'nomor_pos' => '14010201A',
                'lintang' => 0.350583333,
                'bujur' => 101.0898056,
                'elevasi' => 50,
                'desa' => 'Kampar',
                'kondisi_alat' => 'Baik',
                'kepemilikan_alat' => 'BMKG',
                'nama_penanggungjawab' => 'Ahmad Yani',
                'jabatan' => 'Pengamat',
                'pengiriman_data' => 'Aktif',
                'ketersediaan_data' => '2022 - Sekarang',
                'keterangan_alat' => 'Kondisi Normal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pos' => 'ARG Bangkinang',
                'jenis_alat' => 'ARG',
                'nomor_pos' => 'Sta0201',
                'lintang' => 0.326305556,
                'bujur' => 101.0395556,
                'elevasi' => 45,
                'desa' => 'Bangkinang',
                'kondisi_alat' => 'Baik',
                'kepemilikan_alat' => 'BMKG',
                'nama_penanggungjawab' => 'Siti Aminah',
                'jabatan' => 'Teknisi',
                'pengiriman_data' => 'Aktif',
                'ketersediaan_data' => '2021 - Sekarang',
                'keterangan_alat' => 'Automatic Rain Gauge',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($alatData as $data) {
            Alat::updateOrCreate(
                ['nomor_pos' => $data['nomor_pos']],
                $data
            );
        }
    }
}

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KlasifikasiSuratSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('klasifikasi_surat')->insert([
            ['kode' => 'ME', 'nama' => 'Meteorologi', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'KJ', 'nama' => 'Kebijakan Metereologi Klimatologi dan Geofisika', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'KL', 'nama' => 'Klimatologi', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'GF', 'nama' => 'Geofisika', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'IJ', 'nama' => 'instrumentasi, Kalibrasi, Rekayasa, dan Jaringan Komunikasi', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'PR', 'nama' => 'Perencanaan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'DB', 'nama' => 'Database', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'OT', 'nama' => 'Organisasi dan Ketatalaksanaan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'KA', 'nama' => 'Kearsipan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'TU', 'nama' => 'Ketatausahaan dan Kerumahtanggaan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'HM', 'nama' => 'Hubungan Masyarakat', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'PU', 'nama' => 'Kepustakaan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'TI', 'nama' => 'Teknologi Informasi', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'PW', 'nama' => 'Pengawasan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'PL', 'nama' => 'Perlengkapan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'LB', 'nama' => 'Penelitian, Pengembangan dan Rekayasa (LITBANGYASA)', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'KU', 'nama' => 'Keuangan', 'created_at' => $now, 'updated_at' => $now],
            ['kode' => 'KP', 'nama' => 'Kepegawaian', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

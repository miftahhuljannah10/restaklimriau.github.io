<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BeritaArtikel;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\BukuTamu;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Statistik untuk dashboard
            $stats = [
                'total_users' => User::count(),
                'total_pegawai' => $this->safeCount(Pegawai::class),
                'total_berita' => $this->safeCount(BeritaArtikel::class, ['jenis' => 'berita']),
                'total_artikel' => $this->safeCount(BeritaArtikel::class, ['jenis' => 'artikel']),
                'total_surat_masuk' => $this->safeCount(SuratMasuk::class),
                'total_surat_keluar' => $this->safeCount(SuratKeluar::class),
                'total_buku_tamu' => $this->safeCount(BukuTamu::class),
            ];

            // Berita terbaru
            $recent_berita = $this->safeGet(BeritaArtikel::class, [
                'jenis' => 'berita',
                'status' => 'publish'
            ], 5);

            // Surat masuk terbaru
            $recent_surat_masuk = $this->safeGet(SuratMasuk::class, [], 5);

            // Buku tamu terbaru
            $recent_buku_tamu = $this->safeGet(BukuTamu::class, [], 5);

            return view('admin.dashboard', compact(
                'stats',
                'recent_berita',
                'recent_surat_masuk',
                'recent_buku_tamu'
            ));
        } catch (\Exception $e) {
            // Fallback jika ada error
            $stats = [
                'total_users' => User::count(),
                'total_pegawai' => 0,
                'total_berita' => 0,
                'total_artikel' => 0,
                'total_surat_masuk' => 0,
                'total_surat_keluar' => 0,
                'total_buku_tamu' => 0,
            ];

            return view('admin.dashboard', [
                'stats' => $stats,
                'recent_berita' => collect(),
                'recent_surat_masuk' => collect(),
                'recent_buku_tamu' => collect(),
            ]);
        }
    }

    /**
     * Safely count records with optional conditions
     */
    private function safeCount($model, $conditions = [])
    {
        try {
            $query = $model::query();
            foreach ($conditions as $field => $value) {
                $query->where($field, $value);
            }
            return $query->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Safely get recent records with optional conditions
     */
    private function safeGet($model, $conditions = [], $limit = 5)
    {
        try {
            $query = $model::query();
            foreach ($conditions as $field => $value) {
                $query->where($field, $value);
            }

            // Special handling for SuratMasuk to ensure we have valid data
            if ($model === SuratMasuk::class) {
                $query->whereNotNull('perihal');
            }

            return $query->latest()->take($limit)->get();
        } catch (\Exception $e) {
            return collect();
        }
    }
}

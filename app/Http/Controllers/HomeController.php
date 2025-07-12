<?php

namespace App\Http\Controllers;

use App\Models\FeedbackQuestion;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        // Daftar wilayah dengan kode tingkat IV
        $wilayahRiau = [
            ['nama' => 'Pekanbaru',         'kode' => '1471010002'],
            ['nama' => 'Dumai',             'kode' => '1471020001'],
            ['nama' => 'Bengkalis',         'kode' => '1401010003'],
            ['nama' => 'Rokan Hilir',       'kode' => '1401020004'],
            ['nama' => 'Rokan Hulu',        'kode' => '1401030002'],
            ['nama' => 'Kampar',            'kode' => '1401040003'],
            ['nama' => 'Indragiri Hulu',    'kode' => '1401050001'],
            ['nama' => 'Indragiri Hilir',   'kode' => '1401060001'],
            ['nama' => 'Pelalawan',         'kode' => '1401070002'],
            ['nama' => 'Siak',              'kode' => '1401080002'],
            ['nama' => 'Kuantan Singingi',  'kode' => '1401090001'],
            ['nama' => 'Kepulauan Meranti', 'kode' => '1401100001'],
        ];

        $prakiraanCuacaRiau = [];

        foreach ($wilayahRiau as $wilayah) {
            $cuaca = $this->getCuacaWilayah($wilayah['kode'], $wilayah['nama']);
            if ($cuaca) {
                $prakiraanCuacaRiau[] = $cuaca;
            }
        }
        $gempa = [
            'Shakemap' => 'https://static.bmkg.go.id/20250706185549.mmi.jpg',
            'TanggalJamFormat' => '06 Jul 2025, 18:55:49 WIB',
            'Dirasakan' => 'Gempa Dirasakan',
            'Wilayah' => 'Pusat gempa berada di laut 11 km selatan Amalatu',
            'Magnitude' => '3,1',
            'Kedalaman' => '7 Km',
            'KoordinatFormat' => '3,52 LS - 128,67 BT',
        ];

        // Fetch active feedback questions
        $feedbackQuestions = FeedbackQuestion::where('is_active', true)
            ->with('options')
            ->orderBy('order')
            ->get();

        return view('masyarakat.index', compact('prakiraanCuacaRiau', 'gempa', 'feedbackQuestions'));
        
    }

    private function getCuacaWilayah($kode, $nama)
    {
        return Cache::remember("cuaca_$kode", 300, function () use ($kode, $nama) {
            $url = "https://api.bmkg.go.id/publik/prakiraan-cuaca?adm4={$kode}";

            try {
                $response = Http::timeout(10)->get($url);
                if (!$response->successful()) {
                    return null;
                }

                $data = $response->json();
                $list = $data['data'][0]['cuaca'][0] ?? [];

                $prakiraan = $list[0] ?? null; // Ambil data pertama

                if (!$prakiraan) return null;

                return [
                    'nama' => $nama,
                    'kode' => $kode,
                    'waktu' => $prakiraan['local_datetime'] ?? '',
                    'suhu' => $prakiraan['t'] ?? '-',
                    'kondisi' => $prakiraan['weather_desc'] ?? '-',
                ];
            } catch (\Exception $e) {
                Log::error("Gagal ambil data cuaca untuk {$kode}: " . $e->getMessage());
                return null;
            }
        });
    }
}

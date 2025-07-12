<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\AlatCurahHujan;

class CekKetersediaanDataController extends Controller
{
    /**
     * Display the map with equipment data from database
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all alat data from database with required fields only
        // Filter out records with null coordinates to prevent map errors
        $alatData = Alat::select(
            'nama_pos as nama',
            'jenis_alat as jenis',
            'nomor_pos',
            'lintang as lat',
            'bujur as lng'
        )
            ->whereNotNull('lintang')
            ->whereNotNull('bujur')
            ->whereNotNull('nama_pos')
            ->whereNotNull('jenis_alat')
            ->get();


        $titikAlat = $alatData->map(function ($alat) {
            return [
                'nama' => $alat->nama,
                'jenis' => $alat->jenis,
                'nomor_pos' => $alat->nomor_pos,
                'lat' => (float) $alat->lat,
                'lng' => (float) $alat->lng
            ];
        })->toArray();

        // Define jenis alat for the legend/filter display
        $jenisAlat = [
            ['label' => 'PHK', 'icon' => 'ph_1.png'],
            ['label' => 'ARG', 'icon' => 'arg_1.png'],
            ['label' => 'AWS', 'icon' => 'aws_1.png'],
            ['label' => 'AAWS', 'icon' => 'aaws_1.png'],
            ['label' => 'ASRS', 'icon' => 'asrs_1.png'],
            ['label' => 'IKRO', 'icon' => 'ikro_1.png'],
        ];

        return view('masyarakat.cek-ketersediaan-data', compact('titikAlat', 'jenisAlat'));
    }
    public function show($nomor_pos)
    {
        try {
            // Find the equipment by nomor_pos with relationships
            $alat = Alat::with(['provinsi', 'kabupaten', 'kecamatan'])
                ->where('nomor_pos', $nomor_pos)
                ->firstOrFail();

            // Prepare metadata array from database data
            $metadata = [
                ['label' => 'Nama Pos', 'value' => $alat->nama_pos ?? '-'],
                ['label' => 'Jenis Alat', 'value' => $alat->jenis_alat ?? '-'],
                ['label' => 'Kode Alat', 'value' => $alat->nomor_pos ?? '-'],
                ['label' => 'Latitude', 'value' => $alat->lintang ? number_format($alat->lintang, 6) : '-'],
                ['label' => 'Longitude', 'value' => $alat->bujur ? number_format($alat->bujur, 6) : '-'],
                ['label' => 'Elevasi (dpl)', 'value' => $alat->elevasi ? $alat->elevasi . ' m' : '-'],
                ['label' => 'Desa/Kelurahan', 'value' => $alat->desa ?? '-'],
                ['label' => 'Kecamatan', 'value' => $alat->kecamatan ? $alat->kecamatan->nama : '-'],
                ['label' => 'Kabupaten/Kota', 'value' => $alat->kabupaten ? $alat->kabupaten->nama : '-'],
                ['label' => 'Provinsi', 'value' => $alat->provinsi ? $alat->provinsi->nama : '-'],
                ['label' => 'Kondisi Alat', 'value' => $alat->kondisi_alat ?? '-'],
                ['label' => 'Kepemilikan Alat', 'value' => $alat->kepemilikan_alat ?? '-'],
                ['label' => 'Nama Penanggung Jawab', 'value' => $alat->nama_penanggungjawab ?? '-'],
                ['label' => 'Jabatan', 'value' => $alat->jabatan ?? '-'],
                ['label' => 'Status Pengiriman Data', 'value' => $alat->pengiriman_data ?? '-'],
                ['label' => 'Ketersediaan Data', 'value' => $alat->ketersediaan_data ?? '-'],
                ['label' => 'Keterangan Alat', 'value' => $alat->keterangan_alat ?? '-'],
            ];

            // Fetch real rainfall data from database
            $curahHujanData = AlatCurahHujan::where('nomor_pos', $nomor_pos)->first();

            // Add rainfall statistics to metadata if data exists
            $rainfallStats = [];
            if ($curahHujanData) {
                $rainfallValues = [
                    $curahHujanData->januari ?? 0,
                    $curahHujanData->februari ?? 0,
                    $curahHujanData->maret ?? 0,
                    $curahHujanData->april ?? 0,
                    $curahHujanData->mei ?? 0,
                    $curahHujanData->juni ?? 0,
                    $curahHujanData->juli ?? 0,
                    $curahHujanData->agustus ?? 0,
                    $curahHujanData->september ?? 0,
                    $curahHujanData->oktober ?? 0,
                    $curahHujanData->november ?? 0,
                    $curahHujanData->desember ?? 0,
                ];

                $totalRainfall = array_sum($rainfallValues);
                $avgRainfall = $totalRainfall / 12;
                $maxRainfall = max($rainfallValues);
                $minRainfall = min($rainfallValues);

                $rainfallStats = [
                    ['label' => 'Total Curah Hujan Normal (mm/tahun)', 'value' => number_format($totalRainfall, 1)],
                    ['label' => 'Rata-rata Curah Hujan Normal (mm/bulan)', 'value' => number_format($avgRainfall, 1)],
                    ['label' => 'Curah Hujan Normal Maksimum (mm)', 'value' => number_format($maxRainfall, 1)],
                    ['label' => 'Curah Hujan Normal Minimum (mm)', 'value' => number_format($minRainfall, 1)],
                ];
            }

            // Combine metadata with rainfall statistics
            $metadata = array_merge($metadata, $rainfallStats);

            // Prepare chart data with real rainfall data or default values
            if ($curahHujanData) {
                // Use the already calculated rainfall values
                $chartTitle = 'Grafik Curah Hujan Normal Bulanan - ' . ($alat->nama_pos ?? 'Pos');
                $keteranganGrafik = '<ul><li>Data curah hujan normal untuk pos ' . ($alat->nama_pos ?? 'ini') . '</li><li>Data diambil dari database sistem.</li></ul>';
            } else {
                // If no rainfall data found, use zero values
                $rainfallValues = array_fill(0, 12, 0);
                $chartTitle = 'Grafik Curah Hujan Normal Bulanan - ' . ($alat->nama_pos ?? 'Pos') . ' (Data Tidak Tersedia)';
                $keteranganGrafik = '<ul><li>Data curah hujan untuk pos ' . ($alat->nama_pos ?? 'ini') . ' belum tersedia.</li><li>Silakan hubungi admin untuk informasi lebih lanjut.</li></ul>';
            }

            $dataGrafik = [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                'datasets' => [[
                    'label' => 'Curah Hujan Normal (mm)',
                    'data' => $rainfallValues,
                    'borderColor' => 'rgba(37, 99, 235, 1)',
                    'backgroundColor' => 'rgba(37, 99, 235, 0.2)',
                    'fill' => true,
                    'tension' => 0.4
                ]]
            ];

            $opsiGrafik = [
                'responsive' => true,
                'plugins' => [
                    'legend' => ['display' => true],
                    'title' => ['display' => true, 'text' => $chartTitle]
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'title' => [
                            'display' => true,
                            'text' => 'Curah Hujan (mm)'
                        ]
                    ],
                    'x' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Bulan'
                        ]
                    ]
                ]
            ];

            $tabLabels = ['meta' => 'Metadata Alat', 'grafik' => 'Normal Curah Hujan'];

            return view('masyarakat.detail-alat', compact(
                'alat',
                'metadata',
                'dataGrafik',
                'opsiGrafik',
                'keteranganGrafik',
                'tabLabels'
            ));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If equipment not found, redirect back with error message
            return redirect('/cek-ketersediaan-data')->with('error', 'Data alat dengan nomor pos "' . $nomor_pos . '" tidak ditemukan.');
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect('/cek-ketersediaan-data')->with('error', 'Terjadi kesalahan saat memuat data alat.');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\AlatCurahHujan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToCollection;


class AlatCurahHujanController extends Controller
{
    /**
     * Tampilkan data singkat (hanya beberapa kolom).
     */
    public function index()
    {
        // paginate data curah hujan dengan 10 item per halaman
        $curahHujanData = AlatCurahHujan::with('alat')->paginate(10);
        return view('admin.alat-curah-hujan.index', compact('curahHujanData'));
    }

    /**
     * Tampilkan data lengkap (semua bulan).
     */
    public function full()
    {
        $curahHujanData = AlatCurahHujan::with('alat')->get();
        return view('admin.alat-curah-hujan.full', compact('curahHujanData'));
    }

    /**
     * Form upload/import file.
     */
    public function create()
    {
        return view('admin.alat-curah-hujan.create');
    }

    /**
     * Proses import file Excel/CSV.
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $handle = fopen($file->getRealPath(), 'r');
        $header = fgetcsv($handle, 0, ';'); // delimiter ; sesuai file Anda

        $imported = 0;
        $skipped = 0;

        while (($row = fgetcsv($handle, 0, ';')) !== false) {
            $nomor_pos = trim($row[0] ?? '');

            if (!$nomor_pos) continue;

            // Cek apakah nomor_pos ada di tabel alat
            if (Alat::where('nomor_pos', $nomor_pos)->exists()) {
                $skipped++;
                continue;
            }

            $data = [
                'nomor_pos'  => $nomor_pos,
                'januari'    => $row[1] ?? null,
                'februari'   => $row[2] ?? null,
                'maret'      => $row[3] ?? null,
                'april'      => $row[4] ?? null,
                'mei'        => $row[5] ?? null,
                'juni'       => $row[6] ?? null,
                'juli'       => $row[7] ?? null,
                'agustus'    => $row[8] ?? null,
                'september'  => $row[9] ?? null,
                'oktober'    => $row[10] ?? null,
                'november'   => $row[11] ?? null,
                'desember'   => $row[12] ?? null,
            ];

            AlatCurahHujan::updateOrCreate(
                ['nomor_pos' => $nomor_pos],
                $data
            );
            $imported++;
        }
        fclose($handle);

        return redirect()->route('admin.alat-curah-hujan.index')
            ->with('success', "Import selesai. Data berhasil: $imported, dilewati (tidak ada di alat): $skipped");
    }

    /**
     * Tampilkan detail data.
     */
    public function show(AlatCurahHujan $alatCurahHujan)
    {
        $alatCurahHujan->load('alat');
        return view('admin.alat-curah-hujan.show', compact('alatCurahHujan'));
    }

    /**
     * Form edit data.
     */
    public function edit(AlatCurahHujan $alatCurahHujan)
    {
        return view('admin.alat-curah-hujan.edit', compact('alatCurahHujan'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, AlatCurahHujan $alatCurahHujan)
    {
        $validator = Validator::make($request->all(), [
            'januari' => 'nullable|integer',
            'februari' => 'nullable|integer',
            'maret' => 'nullable|integer',
            'april' => 'nullable|integer',
            'mei' => 'nullable|integer',
            'juni' => 'nullable|integer',
            'juli' => 'nullable|integer',
            'agustus' => 'nullable|integer',
            'september' => 'nullable|integer',
            'oktober' => 'nullable|integer',
            'november' => 'nullable|integer',
            'desember' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.alat-curah-hujan.edit', $alatCurahHujan->nomor_pos)
                ->withErrors($validator)
                ->withInput();
        }

        $alatCurahHujan->update($request->all());

        return redirect()->route('admin.alat-curah-hujan.index')
            ->with('success', 'Data curah hujan berhasil diperbarui');
    }

    /**
     * Hapus data.
     */
    public function destroy(AlatCurahHujan $alatCurahHujan)
    {
        $alatCurahHujan->delete();

        return redirect()->route('admin.alat-curah-hujan.index')
            ->with('success', 'Data curah hujan berhasil dihapus');
    }
}

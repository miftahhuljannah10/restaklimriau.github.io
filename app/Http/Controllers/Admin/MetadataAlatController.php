<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class MetadataAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alats = Alat::with(['provinsi', 'kabupaten', 'kecamatan'])->paginate(10);
        return view('admin.metadata-alat.index', compact('alats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();

        return view('admin.metadata-alat.create', compact('provinsis', 'kabupatens', 'kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_pos' => 'required|string|max:50|unique:alat,nomor_pos',
            'nama_pos' => 'nullable|string|max:100',
            'jenis_alat' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|integer',
            'lintang' => 'nullable|numeric',
            'bujur' => 'nullable|numeric',
            'elevasi' => 'nullable|integer',
            'desa' => 'nullable|string|max:200',
            'provinsi_id' => 'nullable|exists:provinsi,id',
            'kabupaten_id' => 'nullable|exists:kabupaten,id',
            'kecamatan_id' => 'nullable|exists:kecamatan,id',
            'kondisi_alat' => 'nullable|string|max:100',
            'kepemilikan_alat' => 'nullable|string|max:200',
            'nama_penanggungjawab' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:200',
            'pengiriman_data' => 'nullable|string|max:100',
            'ketersediaan_data' => 'nullable|string|max:150',
            'keterangan_alat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
        ]);

        // $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->nama_pos) . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_alat'), $filename);
            $validated['foto'] = 'foto_alat/' . $filename;
        }
        Alat::create($validated);

        return redirect()->route('metadata-alat.index')->with('success', 'Data alat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nomor_pos)
    {
        $alat = Alat::findOrFail($nomor_pos);
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();

        return view('admin.metadata-alat.edit', compact('alat', 'provinsis', 'kabupatens', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nomor_pos)
    {
        $alat = Alat::findOrFail($nomor_pos);

        $validated = $request->validate([
            'nama_pos' => 'required|string|max:100',
            'jenis_alat' => 'required|string|max:100',
            'kode_pos' => 'nullable|integer',
            'lintang' => 'nullable|numeric',
            'bujur' => 'nullable|numeric',
            'elevasi' => 'nullable|integer',
            'desa' => 'nullable|string|max:200',
            'provinsi_id' => 'required|exists:provinsi,id',
            'kabupaten_id' => 'required|exists:kabupaten,id',
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kondisi_alat' => 'nullable|string|max:100',
            'kepemilikan_alat' => 'nullable|string|max:200',
            'nama_penanggungjawab' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:200',
            'pengiriman_data' => 'nullable|string|max:100',
            'ketersediaan_data' => 'nullable|string|max:150',
            'keterangan_alat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($alat->foto && file_exists(public_path($alat->foto))) {
                unlink(public_path($alat->foto));
            }

            // Upload foto baru
            $foto = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->nama_pos) . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_alat'), $filename);
            $validated['foto'] = 'foto_alat/' . $filename;
        }

        $alat->update($validated);

        return redirect()->route('metadata-alat.index')
            ->with('success', 'Data alat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nomor_pos)
    {
        $alat = Alat::findOrFail($nomor_pos);

        if ($alat->foto && Storage::disk('public')->exists($alat->foto)) {
            Storage::disk('public')->delete($alat->foto);
        }

        $alat->delete();

        return redirect()->route('metadata-alat.index')->with('success', 'Data alat berhasil dihapus.');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $csvData = file_get_contents($file);
        $lines = explode(PHP_EOL, $csvData);
        $header = str_getcsv(array_shift($lines), ';');

        // Hapus semua data lama

        Alat::query()->delete();

        // DB::table('alat_curah_hujan')->delete();
        // Alat::truncate();

        foreach ($lines as $line) {
            $row = str_getcsv($line, ';');

            if (count($header) !== count($row)) {
                continue; // lewati jika jumlah kolom tidak cocok
            }

            $data = array_combine($header, $row);

            // Normalisasi angka desimal
            $data['Lintang'] = str_replace(',', '.', $data['Lintang'] ?? '');
            $data['Bujur'] = str_replace(',', '.', $data['Bujur'] ?? '');
            $data['Elevasi (dpl)'] = str_replace(',', '.', $data['Elevasi (dpl)'] ?? '');

            Alat::create([
                'nama_pos' => $data['Nama Pos'] ?? null,
                'jenis_alat' => $data['Jenis Alat'] ?? null,
                'kode_pos' => $data['Kode Pos'] ?? null,
                'nomor_pos' => $data['Nomor Pos'] ?? null,
                'desa' => $data['Desa'] ?? null,
                'lintang' => $data['Lintang'] ?? null,
                'bujur' => $data['Bujur'] ?? null,
                'elevasi' => $data['Elevasi (dpl)'] ?? null,
                'kondisi_alat' => $data['Kondisi Alat'] ?? null,
                'kepemilikan_alat' => $data['Kepemilikan Alat'] ?? null,
                'nama_penanggungjawab' => $data['Nama'] ?? null,
                'jabatan' => $data['Jabatan'] ?? null,
                'pengiriman_data' => $data['Pengiriman Data (aktif/tidak aktif)'] ?? null,
                'ketersediaan_data' => $data['Ketersediaan Data'] ?? null,
                'keterangan_alat' => $data['Keterangan Alat'] ?? null,
                'provinsi_id' => optional(DB::table('provinsi')->where('nama_provinsi', $data['Provinsi'] ?? '')->first())->id,
                'kabupaten_id' => optional(DB::table('kabupaten')->where('nama_kabupaten', $data['Kabupaten/ Kota'] ?? '')->first())->id,
                'kecamatan_id' => optional(DB::table('kecamatan')->where('nama_kecamatan', $data['Kecamatan'] ?? '')->first())->id,
            ]);
        }

        return redirect()->route('metadata-alat.index')->with('success', 'Data berhasil diimpor dan data lama telah dihapus.');
    }
}

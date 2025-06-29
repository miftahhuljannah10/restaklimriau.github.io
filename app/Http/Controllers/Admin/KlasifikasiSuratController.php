<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KlasifikasiSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlasifikasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasi = KlasifikasiSurat::paginate(15);
        return view('admin.tata-usaha.klasifikasi-surat.index', compact('klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tata-usaha.klasifikasi-surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10|unique:klasifikasi_surat',
            'nama' => 'required|string|max:128',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        KlasifikasiSurat::create($validator->validated());

        return redirect()->route('admin.klasifikasi-surat.index')
            ->with('success', 'Klasifikasi surat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KlasifikasiSurat $klasifikasiSurat)
    {
        // Ambil juga surat keluar yang memiliki klasifikasi ini
        $suratKeluar = SuratKeluar::where('klasifikasi_surat_id', $klasifikasiSurat->id)
            ->latest()
            ->paginate(10);

        return view('admin.tata-usaha.klasifikasi-surat.show', compact('klasifikasiSurat', 'suratKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KlasifikasiSurat $klasifikasiSurat)
    {
        return view('admin.tata-usaha.klasifikasi-surat.edit', compact('klasifikasiSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KlasifikasiSurat $klasifikasiSurat)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10|unique:klasifikasi_surat,kode,' . $klasifikasiSurat->id,
            'nama' => 'required|string|max:128',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $klasifikasiSurat->update($validator->validated());

        return redirect()->route('admin.klasifikasi-surat.index')
            ->with('success', 'Klasifikasi surat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KlasifikasiSurat $klasifikasiSurat)
    {
        // Check if any surat keluar is using this klasifikasi
        $suratKeluarCount = SuratKeluar::where('klasifikasi_surat_id', $klasifikasiSurat->id)->count();

        if ($suratKeluarCount > 0) {
            return redirect()->back()
                ->with('error', "Tidak dapat menghapus klasifikasi ini karena sedang digunakan oleh {$suratKeluarCount} surat keluar");
        }

        $klasifikasiSurat->delete();

        return redirect()->route('admin.klasifikasi-surat.index')
            ->with('success', 'Klasifikasi surat berhasil dihapus');
    }
}

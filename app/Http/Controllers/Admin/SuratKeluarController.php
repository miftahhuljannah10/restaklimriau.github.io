<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\KlasifikasiSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SuratKeluar::with('klasifikasiSurat');

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('no_surat', 'like', '%' . $request->search . '%')
                    ->orWhere('perihal', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('klasifikasi')) {
            $query->where('klasifikasi_id', $request->klasifikasi);
        }

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_surat', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal_surat', '<=', $request->tanggal_akhir);
        }

        $suratKeluar = $query->latest()->paginate(15);
        return view('admin.tata-usaha.surat-keluar.index', compact('suratKeluar'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klasifikasi = KlasifikasiSurat::all();
        return view('admin.tata-usaha.surat-keluar.create', compact('klasifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required|string|max:50|unique:surat_keluar',
            'klasifikasi_id' => 'required|exists:klasifikasi_surat,id',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:100',
            'sifat' => 'required|string|max:50',
            'scanning' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'catatan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Handle file upload
        if ($request->hasFile('scanning')) {
            $file = $request->file('scanning');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/surat-keluar', $fileName);
            $data['scanning'] = $fileName;
        }

        SuratKeluar::create($data);

        return redirect()->route('admin.tata-usaha.surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        $suratKeluar->load('klasifikasiSurat');
        return view('admin.tata-usaha.surat-keluar.show', compact('suratKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        $klasifikasi = KlasifikasiSurat::all();
        return view('admin.tata-usaha.surat-keluar.edit', compact('suratKeluar', 'klasifikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required|string|max:50|unique:surat_keluar,no_surat,' . $suratKeluar->id,
            'klasifikasi_id' => 'required|exists:klasifikasi_surat,id',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:100',
            'sifat' => 'required|string|max:50',
            'scanning' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'catatan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Handle file upload
        if ($request->hasFile('scanning')) {
            // Delete old file if exists
            if ($suratKeluar->scanning) {
                Storage::delete('public/surat-keluar/' . $suratKeluar->scanning);
            }

            // Upload new file
            $file = $request->file('scanning');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/surat-keluar', $fileName);
            $data['scanning'] = $fileName;
        }

        $suratKeluar->update($data);

        return redirect()->route('admin.tata-usaha.surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        // Delete file if exists
        if ($suratKeluar->scanning) {
            Storage::delete('public/surat-keluar/' . $suratKeluar->scanning);
        }

        $suratKeluar->delete();

        return redirect()->route('admin.surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus');
    }

    /**
     * Download the scanning file.
     */
    public function downloadScan(SuratKeluar $suratKeluar)
    {
        if (!$suratKeluar->scanning) {
            abort(404);
        }

        $filePath = storage_path('app/public/surat-keluar/' . $suratKeluar->scanning);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath);
    }

    // public function export()
    // {
    //     return Excel::download(new SuratKeluarExport, 'surat-keluar-' . date('Y-m-d') . '.xlsx');
    // }


    public function addKlasifikasiAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:10|unique:klasifikasi_surat',
            'nama' => 'required|string|max:128',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $klasifikasi = KlasifikasiSurat::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Klasifikasi surat berhasil ditambahkan',
            'klasifikasi' => $klasifikasi
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SuratMasuk::query();

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('no_surat', 'like', '%' . $request->search . '%')
                    ->orWhere('perihal', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('dari')) {
            $query->where('dari', 'like', '%' . $request->dari . '%');
        }

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_surat', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal_surat', '<=', $request->tanggal_akhir);
        }

        $suratMasuk = $query->latest()->paginate(15);
        return view('admin.tata-usaha.surat-masuk.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tata-usaha.surat-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required|string|max:50|unique:surat_masuk',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string|max:255',
            'dari' => 'required|string|max:100',
            'jenis' => 'required|string|max:50',
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
            $file->storeAs('public/surat-masuk', $fileName);
            $data['scanning'] = $fileName;
        }

        SuratMasuk::create($data);

        return redirect()->route('admin.tata-usaha.surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        return view('admin.tata-usaha.surat-masuk.show', compact('suratMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        return view('admin.tata-usaha.surat-masuk.edit', compact('suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $validator = Validator::make($request->all(), [
            'no_surat' => 'required|string|max:50|unique:surat_masuk,no_surat,' . $suratMasuk->id,
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string|max:255',
            'dari' => 'required|string|max:100',
            'jenis' => 'required|string|max:50',
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
            if ($suratMasuk->scanning) {
                Storage::delete('public/surat-masuk/' . $suratMasuk->scanning);
            }

            // Upload new file
            $file = $request->file('scanning');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/surat-masuk', $fileName);
            $data['scanning'] = $fileName;
        }

        $suratMasuk->update($data);

        return redirect()->route('admin.tata-usaha.surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        // Delete file if exists
        if ($suratMasuk->scanning) {
            Storage::delete('public/surat-masuk/' . $suratMasuk->scanning);
        }

        $suratMasuk->delete();

        return redirect()->route('admin.surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus');
    }

    /**
     * Download the scanning file.
     */
    public function downloadScan(SuratMasuk $suratMasuk)
    {
        if (!$suratMasuk->scanning) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        $filePath = 'public/surat-masuk/' . $suratMasuk->scanning;

        if (!Storage::exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di storage');
        }

        return Storage::download($filePath, $suratMasuk->scanning);
    }
}

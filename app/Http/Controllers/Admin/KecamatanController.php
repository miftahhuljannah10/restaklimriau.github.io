<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Provinsi;


class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatans = Kecamatan::with(['kabupaten.provinsi'])->paginate(10);
        return view('admin.kecamatan.index', compact('kecamatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $provinsi = Provinsi::all();
        $kabupatens = Kabupaten::all();
        return view('admin.kecamatan.create', compact('kabupatens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'required|exists:kabupaten,id',
            'nama_kecamatan' => 'required|string|max:100',
        ]);

        // $kabupaten = Kabupaten::findOrFail($request->kabupaten_id);

        Kecamatan::create([
            'provinsi_id' => 1, // default provinsi (Riau)
            'kabupaten_id' => $request->kabupaten_id,
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);

        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $kecamatans = Kecamatan::findOrFail($id);
        $kabupatens = Kabupaten::all();
        return view('admin.kecamatan.edit', compact('kecamatans', 'kabupatens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate([
            'kabupaten_id' => 'required|exists:kabupaten,id',
            'nama_kecamatan' => 'required|string|max:100',
        ]);

        // $kabupaten = Kabupaten::findOrFail($request->kabupaten_id);

        $kecamatan->update([
            'provinsi_id' => 1, // default provinsi (Riau)
            'kabupaten_id' => $request->kabupaten_id,
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);

        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil dihapus.');
    }
}

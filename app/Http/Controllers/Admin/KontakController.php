<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontakPerusahaan;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontaks = KontakPerusahaan::orderBy('key')->get();
        return view('admin.kontak.index', compact('kontaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|in:alamat,email,whatsapp,telepon,telegram,instagram,operasional_senin_kamis,operasional_jumat|unique:kontak_perusahaan,key',
            'value' => 'required|string',
            'link' => 'nullable|string',
        ]);

        KontakPerusahaan::create([
            'key' => strtolower($request->key),
            'value' => $request->value,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kontak = KontakPerusahaan::findOrFail($id);
        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kontak = KontakPerusahaan::findOrFail($id);

        $request->validate([
            'key' => 'required|string|in:alamat,email,whatsapp,telepon,telegram,instagram,operasional_senin_kamis,operasional_jumat|unique:kontak_perusahaan,key,' . $kontak->id,
            'value' => 'required|string',
            'link' => 'nullable|string',
        ]);

        $kontak->update([
            'key' => strtolower($request->key),
            'value' => $request->value,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontak = KontakPerusahaan::findOrFail($id);
        $kontak->delete();
        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil dihapus.');
    }
}

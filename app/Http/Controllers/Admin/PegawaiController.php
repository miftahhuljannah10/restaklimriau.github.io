<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = DB::table('pegawai')->get();
        return view('admin.pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'NIP' => 'required|string',
            'golongan' => 'required|string',
            'jabatan' => 'required|string',
            'pendidikan' => 'required|string',
            'kompetensi' => 'required|string',
            'email' => 'required|email|unique:pegawai,email',
            'publikasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_pegawai'), $filename);
            $validated['foto'] = 'foto_pegawai/' . $filename;
        }

        Pegawai::create($validated);

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');
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
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'NIP' => 'required|string',
            'golongan' => 'required|string',
            'jabatan' => 'required|string',
            'pendidikan' => 'required|string',
            'kompetensi' => 'required|string',
            'email' => 'required|email|unique:pegawai,email,' . $id, // Menambahkan pengecekan untuk email di update
            'publikasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Temukan pegawai berdasarkan ID
        $pegawai = Pegawai::findOrFail($id);

        // Cek apakah ada file foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto && file_exists(public_path($pegawai->foto))) {
                unlink(public_path($pegawai->foto)); // Menghapus foto lama
            }

            // Upload foto baru
            $foto = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_pegawai'), $filename);
            $validated['foto'] = 'foto_pegawai/' . $filename;
        } else {
            // Jika tidak ada foto baru, tetap pakai foto yang lama
            $validated['foto'] = $pegawai->foto;
        }

        // Update data pegawai
        $pegawai->update($validated);

        // Redirect ke halaman daftar pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        // Temukan pegawai berdasarkan ID
        $pegawai = Pegawai::findOrFail($id);

        // Hapus foto jika ada
        if ($pegawai->foto && file_exists(public_path($pegawai->foto))) {
            unlink(public_path($pegawai->foto)); // Menghapus foto
        }

        // Hapus pegawai dari database
        $pegawai->delete();

        // Redirect ke halaman daftar pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}

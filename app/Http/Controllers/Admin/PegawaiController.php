<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::paginate(10);

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
        // Debug: Log the incoming request data
        Log::info('Pegawai Store Request:', $request->all());

        try {
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
                'foto' => 'nullable|url|max:500' // Changed to URL validation
            ]);

            $pegawai = Pegawai::create($validated);
            
            Log::info('Pegawai created successfully:', $pegawai->toArray());

            return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            Log::error('Error creating pegawai:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pegawai: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('admin.pegawai.show', compact('pegawai'));
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
            'email' => 'required|email|unique:pegawai,email,' . $id,
            'publikasi' => 'required|string',
            'foto' => 'nullable|url|max:500' // Changed to URL validation
        ]);

        // Temukan pegawai berdasarkan ID
        $pegawai = Pegawai::findOrFail($id);

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

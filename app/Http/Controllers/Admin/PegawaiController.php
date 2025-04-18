<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:128',
            'tanggal_lahir' => 'required|date',
            'nip' => 'required|string|max:128|unique:pegawai,nip',
            'golongan' => 'required|string|max:128',
            'jabatan' => 'required|string|max:128',
            'kompetensi' => 'required|string|max:128',
            'email' => 'required|email|max:128|unique:pegawai,email',
            'pendidikan' => 'required|string|max:128',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publikasi' => 'nullable|string|max:1000',
        ]);

        // if ($request->hasFile('foto')) {
        //     $path = $request->file('foto')->store('pegawai', 'public');
        // } else {
        //     $path = null;
        // }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $path = 'images/' . $imageName;


        Pegawai::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'jabatan' => $request->jabatan,
            'kompetensi' => $request->kompetensi,
            'email' => $request->email,
            'pendidikan' => $request->pendidikan,
            'foto' => $path,
            'publikasi' => $request->publikasi,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

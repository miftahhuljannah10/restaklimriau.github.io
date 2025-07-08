<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BukuTamu::query();

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->status($request->status);
        }

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal')) {
            $query->byDate($request->tanggal);
        }

        // Search berdasarkan nama atau asal
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('asal', 'like', '%' . $request->search . '%')
                    ->orWhere('keperluan', 'like', '%' . $request->search . '%');
            });
        }

        $bukuTamu = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.tata-usaha.buku-tamu.index', compact('bukuTamu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tata-usaha.buku-tamu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'asal' => 'nullable|string|max:255',
            'tanggal_kunjungan' => 'nullable|date',
            'keperluan' => 'nullable|string|max:255',
            'status' => 'required|in:masuk,keluar'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'no_hp.max' => 'Nomor HP maksimal 20 karakter',
            'asal.max' => 'Asal maksimal 255 karakter',
            'tanggal_kunjungan.date' => 'Format tanggal tidak valid',
            'keperluan.max' => 'Keperluan maksimal 255 karakter',
            'status.required' => 'Status wajib dipilih',
            'status.in' => 'Status harus masuk atau keluar'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        BukuTamu::create($request->all());

        return redirect()->route('admin.tata-usaha.buku-tamu.index')
            ->with('success', 'Data buku tamu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BukuTamu $bukuTamu)
    {
        return view('admin.tata-usaha.buku-tamu.show', compact('bukuTamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BukuTamu $bukuTamu)
    {
        return view('admin.tata-usaha.buku-tamu.edit', compact('bukuTamu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BukuTamu $bukuTamu)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'asal' => 'nullable|string|max:255',
            'tanggal_kunjungan' => 'nullable|date',
            'keperluan' => 'nullable|string|max:255',
            'status' => 'required|in:masuk,keluar'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'no_hp.max' => 'Nomor HP maksimal 20 karakter',
            'asal.max' => 'Asal maksimal 255 karakter',
            'tanggal_kunjungan.date' => 'Format tanggal tidak valid',
            'keperluan.max' => 'Keperluan maksimal 255 karakter',
            'status.required' => 'Status wajib dipilih',
            'status.in' => 'Status harus masuk atau keluar'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $bukuTamu->update($request->all());

        return redirect()->route('admin.tata-usaha.buku-tamu.index')
            ->with('success', 'Data buku tamu berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BukuTamu $bukuTamu)
    {
        try {
            $bukuTamu->delete();
            return redirect()->route('admin.tata-usaha.buku-tamu.index')
                ->with('success', 'Data buku tamu berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.tata-usaha.buku-tamu.index')
                ->with('error', 'Gagal menghapus data buku tamu');
        }
    }

    /**
     * Export data to Excel/CSV
     */
    public function export(Request $request)
    {
        $query = BukuTamu::query();

        if ($request->filled('status')) {
            $query->status($request->status);
        }

        if ($request->filled('tanggal_dari') && $request->filled('tanggal_sampai')) {
            $query->whereBetween('tanggal_kunjungan', [$request->tanggal_dari, $request->tanggal_sampai]);
        }

        $bukuTamu = $query->orderBy('created_at', 'desc')->get();

        return view('admin.tata-usaha.buku-tamu.export', compact('bukuTamu'));
    }

    /**
     * Update status tamu (masuk/keluar)
     */
    public function updateStatus(Request $request, BukuTamu $bukuTamu)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:masuk,keluar'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Status tidak valid'], 400);
        }

        $bukuTamu->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui',
            'status' => $bukuTamu->status
        ]);
    }
}

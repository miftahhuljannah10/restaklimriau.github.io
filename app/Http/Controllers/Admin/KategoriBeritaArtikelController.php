<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBeritaArtikel;
use Illuminate\Http\Request;

class KategoriBeritaArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = KategoriBeritaArtikel::withCount([
            'berita as berita_count' => function($query) {
                $query->where('jenis', 'berita');
            },
            'berita as artikel_count' => function($query) {
                $query->where('jenis', 'artikel');
            }
        ])->orderBy('nama', 'asc')->get();

        return view('admin.media.kategori-index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media.kategori-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        //
    }
}

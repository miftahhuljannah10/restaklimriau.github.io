<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\BeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritaList = BeritaArtikel::with('kategori', 'thumbnail')
            ->where('jenis', 'berita')
            ->where('status', 'publish')
            ->latest()
            ->get()
            ->map(function ($berita) {
                return [
                    'id' => 'berita-' . $berita->id,
                    // Get thumbnail directly from the database
                    'image' => $berita->thumbnail ? $berita->thumbnail->media_url : '/assets/images/berita2.png',
                    'kategori' => $berita->kategori->nama ?? 'Umum',
                    'title' => $berita->judul,
                    'author' => $berita->penulis,
                    'date' => $berita->created_at->format('d F Y'),
                    'slug' => $berita->slug,
                ];
            });

        return view('masyarakat.berita', compact('beritaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($slug)
    {
        $berita = BeritaArtikel::with(['kategori', 'thumbnail', 'galeri'])
            ->where('jenis', 'berita')
            ->where('status', 'publish')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('masyarakat.berita-detail', compact('berita'));
    }

    public function category($kategori)
    {
        $beritaList = BeritaArtikel::with('kategori', 'thumbnail')
            ->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('slug', $kategori);
            })
            ->where('jenis', 'berita')
            ->where('status', 'publish')
            ->latest()
            ->get()
            ->map(function ($berita) {
                return [
                    'id' => 'berita-' . $berita->id,
                    'image' => $berita->thumbnail ? $berita->thumbnail->media_url : '/assets/images/berita2.png',
                    'kategori' => $berita->kategori->nama ?? 'Umum',
                    'title' => $berita->judul,
                    'author' => $berita->penulis,
                    'date' => $berita->created_at->format('d F Y'),
                    'slug' => $berita->slug,
                ];
            });

        return view('masyarakat.berita', compact('beritaList'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BeritaArtikel $beritaArtikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeritaArtikel $beritaArtikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeritaArtikel $beritaArtikel)
    {
        //
    }
}

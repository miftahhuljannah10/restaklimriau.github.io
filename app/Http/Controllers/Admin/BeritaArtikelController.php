<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaArtikel;
use Illuminate\Http\Request;

class BeritaArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = BeritaArtikel::latest()->paginate(10);
        return view('admin.berita.berita-artikel.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.berita-artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
}

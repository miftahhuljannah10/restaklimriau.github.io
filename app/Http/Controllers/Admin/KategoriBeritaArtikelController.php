<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBeritaArtikel;
use App\Models\BeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBeritaArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = KategoriBeritaArtikel::withCount([
            'berita as berita_count' => function ($query) {
                $query->where('jenis', 'berita');
            },
            'berita as artikel_count' => function ($query) {
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
        $request->validate([
            'nama' => 'required|string|max:100|unique:kategori_berita_artikel,nama',
        ]);

        $category = new KategoriBeritaArtikel();
        $category->nama = $request->nama;
        $category->slug = Str::slug($request->nama);
        $category->save();

        return redirect()->route('admin.kategori-berita-artikel.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        return view('admin.media.kategori-show', compact('kategoriBeritaArtikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        return view('admin.media.kategori-edit', compact('kategoriBeritaArtikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:kategori_berita_artikel,nama,' . $kategoriBeritaArtikel->id,
        ]);

        $kategoriBeritaArtikel->nama = $request->nama;
        $kategoriBeritaArtikel->slug = Str::slug($request->nama);
        $kategoriBeritaArtikel->save();

        return redirect()->route('admin.kategori-berita-artikel.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        // Check if category has any associated content
        $contentCount = BeritaArtikel::where('kategori_id', $kategoriBeritaArtikel->id)->count();

        if ($contentCount > 0) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih memiliki berita atau artikel terkait.');
        }

        $kategoriBeritaArtikel->delete();
        return redirect()->route('admin.kategori-berita-artikel.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    /**
     * Show all berita for this category
     */
    public function showBerita(Request $request, KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        $query = BeritaArtikel::with(['kategori', 'thumbnail'])
            ->where('jenis', 'berita')
            ->where('kategori_id', $kategoriBeritaArtikel->id);

        // Handle search
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        // Handle status filter
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        // Handle featured filter
        if ($request->filled('featured')) {
            $query->where('featured', $request->get('featured') == '1');
        }

        // Order by latest
        $query->latest();

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $items = $query->paginate($perPage)->withQueryString();
        $type = 'berita';

        // Get categories for filter dropdown (not needed when filtering by specific category, but for consistency)
        $categories = KategoriBeritaArtikel::orderBy('nama')->get();

        return view('admin.media.berita.index', compact('items', 'type', 'kategoriBeritaArtikel', 'categories'));
    }

    /**
     * Show all artikel for this category
     */
    public function showArtikel(Request $request, KategoriBeritaArtikel $kategoriBeritaArtikel)
    {
        $query = BeritaArtikel::with(['kategori', 'thumbnail'])
            ->where('jenis', 'artikel')
            ->where('kategori_id', $kategoriBeritaArtikel->id);

        // Handle search
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        // Handle status filter
        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        // Handle featured filter
        if ($request->filled('featured')) {
            $query->where('featured', $request->get('featured') == '1');
        }

        // Order by latest
        $query->latest();

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $items = $query->paginate($perPage)->withQueryString();
        $type = 'artikel';

        // Get categories for filter dropdown (not needed when filtering by specific category, but for consistency)
        $categories = KategoriBeritaArtikel::orderBy('nama')->get();

        return view('admin.media.berita.index', compact('items', 'type', 'kategoriBeritaArtikel', 'categories'));
    }
}

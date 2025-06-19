<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = KategoriProduk::orderBy('nama_kategori')->paginate(10);
        return view('admin.produk.kategori-produk.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.produk.kategori-produk.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_produk,nama_kategori'
        ]);

        KategoriProduk::create([
            'nama_kategori' => $validated['nama_kategori'],
            'slug' => Str::slug($validated['nama_kategori'])
        ]);

        return redirect()
            ->route('kategori-produk.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        return view('admin.produk.kategori-produk.edit', compact('kategoriProduk'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_produk,nama_kategori,' . $kategoriProduk->id
        ]);

        $kategoriProduk->update([
            'nama_kategori' => $validated['nama_kategori'],
            'slug' => Str::slug($validated['nama_kategori'])
        ]);

        return redirect()
            ->route('kategori-produk.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        // Check if category has any products
        if ($kategoriProduk->produk()->exists()) {
            return redirect()
                ->route('kategori-produk.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki produk');
        }

        $kategoriProduk->delete();

        return redirect()
            ->route('kategori-produk.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}

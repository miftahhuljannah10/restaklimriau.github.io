<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\GambarProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    // protected $jenis = ['cuaca', 'perubahan_iklim', 'kualitas_udara', 'informasi_iklim', 'iklim_terapan'];

    /**
     * Display a listing of the products.
     */
    public function index($type)
    {
        $produks = Produk::with('kategori', 'gambar')
            ->where('jenis_produk', $type)
            ->latest()
            ->paginate(10);

        return view('admin.produk.index', compact('produks', 'type'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create($type)
    {
        $kategoris = KategoriProduk::orderBy('nama_kategori')->get();

        return view('admin.produk.create', [
            'produk' => new Produk(),
            'kategoris' => $kategoris,
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request, $type)
    {
        // dd($request->all());
        // dd($type, strlen($type));
        $validTypes = ['cuaca', 'perubahan_iklim', 'kualitas_udara', 'informasi_iklim', 'iklim_terapan'];

        if (!in_array($type, $validTypes)) {
            abort(404, 'Jenis produk tidak valid');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'script' => 'nullable|string',
            'penulis' => 'nullable|string|max:255',
            // 'kategori_id' => 'required|array|exists:kategori_produk,id',
            'kategori_id' => 'required|exists:kategori_produk,id',
            'gambar' => 'nullable|array',
            'gambar.*' => 'url',
            'status' => 'required|in:draft,published,archived',
        ]);

        $produk = Produk::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'] ?? null,
            'script' => $validated['script'] ?? null,
            'penulis' => $validated['penulis'] ?? null,
            'jenis_produk' => $type,
            'status' => $validated['status'],
        ]);

        $produk->kategori()->sync($validated['kategori_id']);

        foreach ($validated['gambar'] ?? [] as $index => $url) {
            $produk->gambar()->create([
                'path' => $url,
                'urutan' => $index,
            ]);
        }

        return redirect()->route('produk.index', $type)->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($type, $id)
    {
        $validTypes = ['cuaca', 'perubahan_iklim', 'kualitas_udara', 'informasi_iklim', 'iklim_terapan'];
        if (!in_array($type, $validTypes)) {
            abort(404, 'Jenis produk tidak valid');
        }

        $produk = Produk::with('kategori', 'gambar')->findOrFail($id);
        $kategoris = KategoriProduk::orderBy('nama_kategori')->get();

        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategoris' => $kategoris,
            'type' => $type
        ]);
    }



    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $type, $id)
    {
        $validTypes = ['cuaca', 'perubahan_iklim', 'kualitas_udara', 'informasi_iklim', 'iklim_terapan'];
        if (!in_array($type, $validTypes)) {
            abort(404, 'Jenis produk tidak valid');
        }

        $produk = Produk::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'script' => 'nullable|string',
            'penulis' => 'nullable|string|max:255',
            'kategori_id' => 'required|array',
            'kategori_id.*' => 'exists:kategori_produk,id',
            'gambar' => 'nullable|array',
            'gambar.*' => 'url',
            'status' => 'required|in:draft,published,archived',
        ]);

        $produk->update([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'] ?? null,
            'script' => $validated['script'] ?? null,
            'penulis' => $validated['penulis'] ?? null,
            'status' => $validated['status']
        ]);

        $produk->kategori()->sync($validated['kategori_id']);

        // Hapus gambar yang lama
        $produk->gambar()->delete();

        // Tambahkan gambar baru jika ada
        foreach ($validated['gambar'] ?? [] as $index => $url) {
            $produk->gambar()->create([
                'path' => $url,
                'urutan' => $index,
            ]);
        }

        return redirect()->route('produk.index', $type)->with('success', 'Produk berhasil diperbarui');
    }


    /**
     * Remove the specified product from storage.
     */
    public function destroy($type, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->gambar()->delete();
        $produk->delete();

        return redirect()->route('produk.index', $type)->with('success', 'Produk berhasil dihapus');
    }

    /**
     * Update the status of the specified product.
     */
    public function updateStatus(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'status' => 'required|in:draft,published,archived'
        ]);

        $produk->update(['status' => $validated['status']]);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Status produk berhasil diperbarui');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/froala_uploads');
            $url = Storage::url($path);
            return response()->json(['link' => $url]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaArtikel;
use App\Models\KategoriBeritaArtikel;
use App\Models\MediaBeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BeritaArtikelController extends Controller
{
    /**
     * Display a listing of the resource by type.
     */
    public function index(Request $request, $type = 'berita')
    {
        // Validate type parameter
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.index', 'berita');
        }

        $query = BeritaArtikel::with(['kategori', 'thumbnail'])
            ->where('jenis', $type);

        // Handle search
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%")
                    ->orWhereHas('kategori', function ($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
                    });
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

        return view('admin.media.berita.index', compact('items', 'type'));
    }

    public function publicIndex()
    {
        $beritaList = BeritaArtikel::with('kategori', 'thumbnail')
            ->where('jenis', 'berita')
            ->where('status', 'publish')
            ->latest()
            ->get()
            ->map(function ($berita) {
                return [
                    'id' => 'berita-' . $berita->id,
                    'image' => $berita->thumbnail ?
                        (Storage::url($berita->thumbnail->media_url)) :
                        '/assets/images/',
                    'kategori' => $berita->kategori->nama,
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
    public function create($type = 'berita')
    {
        // Validate type parameter
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.create', 'berita');
        }

        $categories = KategoriBeritaArtikel::orderBy('nama')->get();
        return view('admin.media.berita.create', compact('type', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, $type)
    {
        // Log input untuk debugging



        try {
            // Validate type parameter
            if (!in_array($type, ['berita', 'artikel'])) {
                return redirect()->route('admin.media.berita.index', 'berita')
                    ->with('error', 'Tipe konten tidak valid.');
            }

            // Validation rules
            $rules = [
                'judul' => 'required|string|max:300',
                'isi' => 'required|string',
                'kategori_id' => 'required|exists:kategori_berita_artikel,id',
                'penulis' => 'required|string|max:100',
                'status' => 'required|in:draft,publish,archived',
            ];

            // Add thumbnail validation
            if ($request->thumbnail_type === 'url') {
                $rules['thumbnail_url'] = 'required|url';
            } else {
                $rules['thumbnail'] = 'required|image|max:2048';
            }

            $request->validate($rules);

            // Create the BeritaArtikel
            $content = new BeritaArtikel();
            $content->jenis = $type;
            $content->judul = $request->judul;
            $content->isi = $request->isi;
            $content->kategori_id = $request->kategori_id;
            $content->penulis = $request->penulis;
            $content->slug = Str::slug($request->judul);
            $content->status = $request->status;
            $content->featured = $request->has('featured');
            $content->save();

            // Handle thumbnail
            if ($request->thumbnail_type === 'url') {
                // Create thumbnail record with URL
                $thumbnail = new MediaBeritaArtikel();
                $thumbnail->berita_artikel_id = $content->id;
                $thumbnail->media_url = $request->thumbnail_url;
                $thumbnail->tipe = 'thumbnail';
                $thumbnail->caption = $request->thumbnail_caption ?? $request->judul;
                $thumbnail->alt_text = $request->judul;
                $thumbnail->urutan = 0;
                $thumbnail->save();
            } elseif ($request->hasFile('thumbnail')) {
                // Upload thumbnail file
                $thumbnailPath = $request->file('thumbnail')->store('media/berita-artikel', 'public');

                $thumbnail = new MediaBeritaArtikel();
                $thumbnail->berita_artikel_id = $content->id;
                $thumbnail->media_url = $thumbnailPath;
                $thumbnail->tipe = 'thumbnail';
                $thumbnail->caption = $request->thumbnail_caption ?? $request->judul;
                $thumbnail->alt_text = $request->judul;
                $thumbnail->urutan = 0;
                $thumbnail->save();
            }

            // Handle gallery images
            if ($request->has('gallery_urls') && is_array($request->gallery_urls)) {
                foreach ($request->gallery_urls as $index => $url) {
                    if (!empty($url)) {
                        $galleryImage = new MediaBeritaArtikel();
                        $galleryImage->berita_artikel_id = $content->id;
                        $galleryImage->media_url = $url;
                        $galleryImage->tipe = 'galeri';
                        $galleryImage->caption = $request->gallery_captions[$index] ?? null;
                        $galleryImage->alt_text = $request->gallery_alts[$index] ?? null;
                        $galleryImage->urutan = $index + 1;
                        $galleryImage->save();
                    }
                }
            }

            $typeName = $type === 'berita' ? 'Berita' : 'Artikel';
            return redirect()->route('admin.media.berita.index', $type)
                ->with('success', "$typeName berhasil ditambahkan.");
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($type, $id)
    {
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.index', 'berita')
                ->with('error', 'Tipe konten tidak valid.');
        }

        $item = BeritaArtikel::with(['kategori', 'thumbnail', 'galeri'])
            ->where('jenis', $type)
            ->findOrFail($id);

        return view('admin.media.berita.show', compact('item', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type, $id)
    {
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.index', 'berita')
                ->with('error', 'Tipe konten tidak valid.');
        }

        $item = BeritaArtikel::with(['kategori', 'thumbnail', 'galeri'])
            ->where('jenis', $type)
            ->findOrFail($id);

        $categories = KategoriBeritaArtikel::orderBy('nama')->get();

        return view('admin.media.berita.edit', compact('item', 'type', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type, $id)
    {
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.index', 'berita')
                ->with('error', 'Tipe konten tidak valid.');
        }

        // Validation rules
        $rules = [
            'judul' => 'required|string|max:300',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori_berita_artikel,id',
            'penulis' => 'required|string|max:100',
            'status' => 'required|in:draft,publish,archived',
        ];

        // Add thumbnail validation if updating
        if ($request->has('update_thumbnail') && $request->update_thumbnail) {
            if ($request->thumbnail_type === 'url') {
                $rules['thumbnail_url'] = 'required|url';
            } else {
                $rules['thumbnail'] = 'required|image|max:2048';
            }
        }

        $request->validate($rules);

        // Update the BeritaArtikel
        $content = BeritaArtikel::where('jenis', $type)->findOrFail($id);
        $content->judul = $request->judul;
        $content->isi = $request->isi;
        $content->kategori_id = $request->kategori_id;
        $content->penulis = $request->penulis;
        $content->slug = Str::slug($request->judul);
        $content->status = $request->status;
        $content->featured = $request->has('featured');
        $content->save();

        // Update thumbnail if requested
        if ($request->has('update_thumbnail') && $request->update_thumbnail) {
            // Delete old thumbnail if exists
            $oldThumbnail = $content->thumbnail;
            if ($oldThumbnail) {
                // Only delete from storage if it's a locally stored file
                if (Str::startsWith($oldThumbnail->media_url, 'media/')) {
                    Storage::disk('public')->delete($oldThumbnail->media_url);
                }
                $oldThumbnail->delete();
            }

            // Add new thumbnail
            if ($request->thumbnail_type === 'url') {
                $thumbnail = new MediaBeritaArtikel();
                $thumbnail->berita_artikel_id = $content->id;
                $thumbnail->media_url = $request->thumbnail_url;
                $thumbnail->tipe = 'thumbnail';
                $thumbnail->caption = $request->thumbnail_caption ?? $request->judul;
                $thumbnail->alt_text = $request->judul;
                $thumbnail->urutan = 0;
                $thumbnail->save();
            } elseif ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('media/berita-artikel', 'public');

                $thumbnail = new MediaBeritaArtikel();
                $thumbnail->berita_artikel_id = $content->id;
                $thumbnail->media_url = $thumbnailPath;
                $thumbnail->tipe = 'thumbnail';
                $thumbnail->caption = $request->thumbnail_caption ?? $request->judul;
                $thumbnail->alt_text = $request->judul;
                $thumbnail->urutan = 0;
                $thumbnail->save();
            }
        }

        // Handle gallery deletions
        if ($request->has('delete_gallery_ids') && is_array($request->delete_gallery_ids)) {
            foreach ($request->delete_gallery_ids as $mediaId) {
                $media = MediaBeritaArtikel::where('id', $mediaId)
                    ->where('berita_artikel_id', $content->id)
                    ->where('tipe', 'galeri')
                    ->first();

                if ($media) {
                    // Only delete from storage if it's a locally stored file
                    if (Str::startsWith($media->media_url, 'media/')) {
                        Storage::disk('public')->delete($media->media_url);
                    }
                    $media->delete();
                }
            }
        }

        // Handle new gallery images
        if ($request->has('gallery_urls') && is_array($request->gallery_urls)) {
            $maxOrder = $content->galeri->max('urutan') ?? 0;

            foreach ($request->gallery_urls as $index => $url) {
                if (!empty($url)) {
                    $galleryImage = new MediaBeritaArtikel();
                    $galleryImage->berita_artikel_id = $content->id;
                    $galleryImage->media_url = $url;
                    $galleryImage->tipe = 'galeri';
                    $galleryImage->caption = $request->gallery_captions[$index] ?? null;
                    $galleryImage->alt_text = $request->gallery_alts[$index] ?? null;
                    $galleryImage->urutan = $maxOrder + $index + 1;
                    $galleryImage->save();
                }
            }
        }

        $typeName = $type === 'berita' ? 'Berita' : 'Artikel';
        return redirect()->route('admin.media.berita.index', $type)
            ->with('success', "$typeName berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type, $id)
    {
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.index', 'berita')
                ->with('error', 'Tipe konten tidak valid.');
        }

        $content = BeritaArtikel::where('jenis', $type)->findOrFail($id);

        // Delete all associated media files from storage
        foreach ($content->media as $media) {
            // Only delete from storage if it's a locally stored file
            if (Str::startsWith($media->media_url, 'media/')) {
                Storage::disk('public')->delete($media->media_url);
            }
        }

        $content->delete(); // Use soft delete

        $typeName = $type === 'berita' ? 'Berita' : 'Artikel';
        return redirect()->route('admin.media.berita.index', $type)
            ->with('success', "$typeName berhasil dihapus.");
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured($type, $id)
    {
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.index', 'berita')
                ->with('error', 'Tipe konten tidak valid.');
        }

        $content = BeritaArtikel::where('jenis', $type)->findOrFail($id);
        $content->featured = !$content->featured;
        $content->save();

        $status = $content->featured ? 'ditambahkan ke' : 'dihapus dari';
        $typeName = $type === 'berita' ? 'Berita' : 'Artikel';

        return redirect()->back()
            ->with('success', "$typeName berhasil $status featured.");
    }

    /**
     * Update publication status
     */
    public function updateStatus(Request $request, $type, $id)
    {
        if (!in_array($type, ['berita', 'artikel'])) {
            return redirect()->route('admin.media.berita.index', 'berita')
                ->with('error', 'Tipe konten tidak valid.');
        }

        $request->validate([
            'status' => 'required|in:draft,publish,archived',
        ]);

        $content = BeritaArtikel::where('jenis', $type)->findOrFail($id);
        $content->status = $request->status;
        $content->save();

        $typeName = $type === 'berita' ? 'Berita' : 'Artikel';
        $statusLabel = [
            'draft' => 'draft',
            'publish' => 'dipublikasikan',
            'archived' => 'diarsipkan'
        ][$request->status];

        return redirect()->back()
            ->with('success', "$typeName berhasil $statusLabel.");
    }

    /**
     * Upload image for the editor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('media/editor', 'public');

            return response()->json([
                'url' => Storage::url($path)
            ]);
        }

        return response()->json([
            'error' => [
                'message' => 'Terjadi kesalahan saat mengunggah gambar.'
            ]
        ], 400);
    }
}

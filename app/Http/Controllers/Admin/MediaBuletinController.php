<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaBuletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MediaBuletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buletins = MediaBuletin::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.media.buletin.index', compact('buletins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media.buletin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'edisi' => 'nullable|string',
            'image' => 'required|string', // URL Google Drive
            'link' => 'nullable|string|max:255',
            'penulis' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        MediaBuletin::create($request->all());

        return redirect()->route('admin.media.buletin.index')
            ->with('success', 'Buletin berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MediaBuletin $buletin)
    {
        return view('admin.media.buletin.show', compact('buletin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MediaBuletin $buletin)
    {
        return view('admin.media.buletin.edit', compact('buletin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediaBuletin $buletin)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'edisi' => 'nullable|string',
            'image' => 'required|string', // URL Google Drive
            'link' => 'nullable|string|max:255',
            'penulis' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $buletin->update($request->all());

        return redirect()->route('admin.media.buletin.index')
            ->with('success', 'Buletin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MediaBuletin $buletin)
    {
        $buletin->delete();

        return redirect()->route('admin.media.buletin.index')
            ->with('success', 'Buletin berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisiMisiSection;
use App\Models\VisiMisiItem;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sections = VisiMisiSection::with('items')->get();
            return view('admin.visimisi.index', compact('sections'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.visimisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_type' => 'required|in:visi,misi,tugas',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'is_active' => 'boolean',
            'items' => 'array',
            'items.*.content' => 'required_with:items|string',
            'items.*.order_number' => 'required_with:items|integer',
            'items.*.is_active' => 'required|in:true,false,1,0',
        ]);

        $section = VisiMisiSection::create([
            'section_type' => $request->section_type,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->is_active ?? true,
        ]);

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                $section->items()->create([
                    'content' => $item['content'],
                    'order_number' => $item['order_number'],
                    'is_active' => filter_var($item['is_active'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true,
                ]);
            }
        }

        return redirect()->route('admin.visimisi.index')->with('success', 'Section dan item berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $section = VisiMisiSection::with('items')->findOrFail($id);
        $items = $section->items()->orderBy('order_number')->get();
        return view('admin.visimisi.show', compact('section', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section = VisiMisiSection::findOrFail($id);
        $items = $section->items()->orderBy('order_number')->get();
        return view('admin.visimisi.edit', compact('section', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'section_type' => 'required|in:visi,misi,tugas',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'is_active' => 'boolean',
            'items' => 'array',
            'items.*.id' => 'nullable|integer|exists:visimisi_items,id',
            'items.*.content' => 'required_with:items|string',
            'items.*.order_number' => 'required_with:items|integer',
            'items.*.is_active' => 'required|in:true,false,1,0',
        ]);

        $section = VisiMisiSection::findOrFail($id);
        $section->update([
            'section_type' => $request->section_type,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->is_active ?? true,
        ]);

        $existingItemIds = $section->items()->pluck('id')->toArray();
        $submittedItemIds = collect($request->items)->pluck('id')->filter()->toArray();
        $toDelete = array_diff($existingItemIds, $submittedItemIds);
        if (!empty($toDelete)) {
            VisiMisiItem::destroy($toDelete);
        }

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                $isActive = filter_var($item['is_active'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true;
                if (isset($item['id'])) {
                    $visiMisiItem = VisiMisiItem::find($item['id']);
                    if ($visiMisiItem) {
                        $visiMisiItem->update([
                            'content' => $item['content'],
                            'order_number' => $item['order_number'],
                            'is_active' => $isActive,
                        ]);
                    }
                } else {
                    $section->items()->create([
                        'content' => $item['content'],
                        'order_number' => $item['order_number'],
                        'is_active' => $isActive,
                    ]);
                }
            }
        }

        return redirect()->route('admin.visimisi.index', $section->id)->with('success', 'Section dan item berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = VisiMisiSection::findOrFail($id);
        $section->delete();
        return redirect()->route('admin.visimisi.index')->with('success', 'Section dan seluruh item berhasil dihapus.');
    }
    /**
     * Remove a single item from a section.
     */
    public function destroyItem($sectionId, $itemId)
    {
        $item = VisiMisiItem::where('section_id', $sectionId)->where('id', $itemId)->firstOrFail();
        $item->delete();
        return redirect()->back()->with('success', 'Item berhasil dihapus.');
    }
}

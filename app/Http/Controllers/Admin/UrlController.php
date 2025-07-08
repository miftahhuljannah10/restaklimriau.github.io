<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        abort_unless(array_key_exists($type, Url::getMenuTypes()), 404);

        $urls = Url::where('menu_type', $type)->latest()->paginate(10);
        return view('admin.url.index', compact('urls', 'type'));

        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        abort_unless(array_key_exists($type, Url::getMenuTypes()), 404);

        return view('admin.url.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $type)
    {
        abort_unless(array_key_exists($type, Url::getMenuTypes()), 404);

        $request->validate([
            'url' => 'required|url',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        Url::create([
            'url' => $request->url,
            'menu_type' => $type,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('url.index', ['type' => $type])->with('success', 'URL created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type, string $id)
    {
        abort_unless(array_key_exists($type, Url::getMenuTypes()), 404);

        $url = Url::where('menu_type', $type)->findOrFail($id);
        return view('admin.url.edit', compact('url', 'type'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type, string $id)
    {
        abort_unless(array_key_exists($type, Url::getMenuTypes()), 404);

        $url = Url::where('menu_type', $type)->findOrFail($id);

        $request->validate([
            'url' => 'required|url|unique:url_tabel,url,' . $url->id,
            'deskripsi' => 'nullable|string',
        ]);

        $url->update([
            'url' => $request->url,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('url.index', $type)->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type, string $id )
    {
        abort_unless(array_key_exists($type, Url::getMenuTypes()), 404);

        $url = Url::where('menu_type', $type)->findOrFail($id);
        $url->delete();

        return redirect()->route('url.index', $type)->with('success', 'Data berhasil dihapus.');
    }

    //

}

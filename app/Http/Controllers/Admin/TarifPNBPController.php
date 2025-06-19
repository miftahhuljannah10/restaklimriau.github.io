<?php

namespace App\Http\Controllers\Admin;

use App\Models\TarifPNBP;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarifPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all TarifPNBP records with pagination
        $tarifs = TarifPNBP::paginate(10);
        // Return the view with the tarifPNBP data
        return view('admin.tarif-pnbp.index', compact('tarifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new TarifPNBP
        return view('admin.tarif-pnbp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'nama_tarif' => 'required|string|max:255',
            'jenis_tarif' => 'required|string|max:255',
            'tarif' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'waktu' => 'required|string|max:50',
        ]);

        // Create a new TarifPNBP record
        TarifPNBP::create($validated);

        // Redirect to the index page with a success message
        return redirect()->route('tarif-pnbp.index')->with('success', 'Tarif PNBP berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        // Find the TarifPNBP record by ID
        $tarif = TarifPNBP::findOrFail($id);
        // Return the view for editing the TarifPNBP
        return view('admin.tarif-pnbp.edit', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'nama_tarif' => 'required|string|max:255',
            'jenis_tarif' => 'required|string|max:255',
            'tarif' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'waktu' => 'required|string|max:50',
        ]); 

        // Find the TarifPNBP record by ID and update it
        $tarif = TarifPNBP::findOrFail($id);
        $tarif->update($validated);

        // Redirect to the index page with a success message
        return redirect()->route('tarif-pnbp.index')->with('success', 'Tarif PNBP berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the TarifPNBP record by ID
        $tarif = TarifPNBP::findOrFail($id);
        // Delete the record
        $tarif->delete();

        // Redirect to the index page with a success message
        return redirect()->route('tarif-pnbp.index')->with('success', 'Tarif PNBP berhasil dihapus.');
    }
}

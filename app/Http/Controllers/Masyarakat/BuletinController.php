<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\MediaBuletin;
use Illuminate\Http\Request;

class BuletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buletinList =MediaBuletin::where('status', 'published')
            ->orderByDesc('created_at')
            ->get();

        return view('masyarakat.buletin', compact('buletinList'));
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
    public function show(MediaBuletin $mediaBuletin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MediaBuletin $mediaBuletin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediaBuletin $mediaBuletin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MediaBuletin $mediaBuletin)
    {
        //
    }
}

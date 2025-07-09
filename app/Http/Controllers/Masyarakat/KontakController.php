<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\KontakPerusahaan;

class KontakController extends Controller
{
    public function index()
    {
        $kontakRows = KontakPerusahaan::all();

        $kontak = [];
        foreach ($kontakRows as $row) {
            $kontak[strtolower($row->key)] = trim((string) $row->value);
            $kontak[strtolower($row->key) . '_link'] = $row->link ? trim((string) $row->link) : null;
        }

        return view('masyarakat.kontak', compact('kontak'));
    }
}

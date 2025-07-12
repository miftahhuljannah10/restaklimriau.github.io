<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\VisiMisiSection;
use App\Models\VisiMisiItem;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {

        $urlRows = Url::all();
        $urls = [];
        foreach ($urlRows as $row) {
            $urls[strtolower($row->menu_type)] = [
                'url' => trim((string) $row->url),
                'deskripsi' => trim((string) $row->deskripsi),
            ];
        }

        // Fetch VisiMisi sections and items
        $visiMisiSections = VisiMisiSection::where('is_active', true)
            ->with(['items' => function ($query) {
                $query->where('is_active', true)->orderBy('order_number');
            }])
            ->get();

        return view('masyarakat.profil', compact('urls', 'visiMisiSections'));
    }

    private function parseYoutubeUrl($url)
    {
        if (!$url) return '';
        if (str_contains($url, 'embed')) return $url;

        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);
        return isset($matches[1]) ? 'https://www.youtube.com/embed/' . $matches[1] . '?rel=0' : $url;
    }
}

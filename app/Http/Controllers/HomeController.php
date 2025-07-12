<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaArtikel;

class HomeController extends Controller
{
    public function index()
    {
        $gempa = [
            'Shakemap' => 'https://static.bmkg.go.id/20250706185549.mmi.jpg',
            'TanggalJamFormat' => '06 Jul 2025, 18:55:49 WIB',
            'Dirasakan' => 'Gempa Dirasakan',
            'Wilayah' => 'Pusat gempa berada di laut 11 km selatan Amalatu',
            'Magnitude' => '3,1',
            'Kedalaman' => '7 Km',
            'KoordinatFormat' => '3,52 LS - 128,67 BT',
        ];
        $prakiraanCuacaRiau = [
            [
                'nama' => 'Pekanbaru',
                'kode' => '14.71.01.1002',
                'waktu' => '15.40 WIB',
                'suhu' => 30,
                'kondisi' => 'Cerah',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="32" cy="32" r="14" fill="#FFD600"/><g stroke="#FFB300" stroke-width="2"><line x1="32" y1="8" x2="32" y2="0"/><line x1="32" y1="56" x2="32" y2="64"/><line x1="8" y1="32" x2="0" y2="32"/><line x1="56" y1="32" x2="64" y2="32"/><line x1="14.93" y1="14.93" x2="8.49" y2="8.49"/><line x1="49.07" y1="14.93" x2="55.51" y2="8.49"/><line x1="14.93" y1="49.07" x2="8.49" y2="55.51"/><line x1="49.07" y1="49.07" x2="55.51" y2="55.51"/></g></svg>',
            ],
            [
                'nama' => 'Dumai',
                'kode' => '14.71.02.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 29,
                'kondisi' => 'Berawan',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="40" cy="44" rx="16" ry="10" fill="#B0BEC5"/><ellipse cx="28" cy="40" rx="14" ry="9" fill="#ECEFF1"/></svg>',
            ],
            [
                'nama' => 'Bengkalis',
                'kode' => '14.71.03.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 28,
                'kondisi' => 'Cerah Berawan',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="22" cy="26" r="10" fill="#FFD600"/><ellipse cx="40" cy="44" rx="16" ry="10" fill="#B0BEC5"/><ellipse cx="28" cy="40" rx="14" ry="9" fill="#ECEFF1"/></svg>',
            ],
            [
                'nama' => 'Siak',
                'kode' => '14.71.04.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 27,
                'kondisi' => 'Cerah',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="32" cy="32" r="14" fill="#FFD600"/><g stroke="#FFB300" stroke-width="2"><line x1="32" y1="8" x2="32" y2="0"/><line x1="32" y1="56" x2="32" y2="64"/><line x1="8" y1="32" x2="0" y2="32"/><line x1="56" y1="32" x2="64" y2="32"/><line x1="14.93" y1="14.93" x2="8.49" y2="8.49"/><line x1="49.07" y1="14.93" x2="55.51" y2="8.49"/><line x1="14.93" y1="49.07" x2="8.49" y2="55.51"/><line x1="49.07" y1="49.07" x2="55.51" y2="55.51"/></g></svg>',
            ],
            [
                'nama' => 'Rokan Hulu',
                'kode' => '14.71.05.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 26,
                'kondisi' => 'Hujan Ringan',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="40" cy="44" rx="16" ry="10" fill="#B0BEC5"/><ellipse cx="28" cy="40" rx="14" ry="9" fill="#ECEFF1"/><g stroke="#4FC3F7" stroke-width="2"><line x1="24" y1="54" x2="24" y2="60"/><line x1="32" y1="54" x2="32" y2="60"/><line x1="40" y1="54" x2="40" y2="60"/></g></svg>',
            ],
            [
                'nama' => 'Indragiri Hulu',
                'kode' => '14.71.06.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 27,
                'kondisi' => 'Cerah Berawan',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="22" cy="26" r="10" fill="#FFD600"/><ellipse cx="40" cy="44" rx="16" ry="10" fill="#B0BEC5"/><ellipse cx="28" cy="40" rx="14" ry="9" fill="#ECEFF1"/></svg>',
            ],
            [
                'nama' => 'Pelalawan',
                'kode' => '14.71.07.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 28,
                'kondisi' => 'Berawan',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="40" cy="44" rx="16" ry="10" fill="#B0BEC5"/><ellipse cx="28" cy="40" rx="14" ry="9" fill="#ECEFF1"/></svg>',
            ],
            [
                'nama' => 'Kuantan Singingi',
                'kode' => '14.71.08.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 29,
                'kondisi' => 'Hujan Sedang',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="40" cy="44" rx="16" ry="10" fill="#B0BEC5"/><ellipse cx="28" cy="40" rx="14" ry="9" fill="#ECEFF1"/><g stroke="#0288D1" stroke-width="3"><line x1="20" y1="54" x2="20" y2="62"/><line x1="32" y1="54" x2="32" y2="62"/><line x1="44" y1="54" x2="44" y2="62"/></g></svg>',
            ],
            [
                'nama' => 'Meranti',
                'kode' => '14.71.09.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 27,
                'kondisi' => 'Cerah',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="32" cy="32" r="14" fill="#FFD600"/><g stroke="#FFB300" stroke-width="2"><line x1="32" y1="8" x2="32" y2="0"/><line x1="32" y1="56" x2="32" y2="64"/><line x1="8" y1="32" x2="0" y2="32"/><line x1="56" y1="32" x2="64" y2="32"/><line x1="14.93" y1="14.93" x2="8.49" y2="8.49"/><line x1="49.07" y1="14.93" x2="55.51" y2="8.49"/><line x1="14.93" y1="49.07" x2="8.49" y2="55.51"/><line x1="49.07" y1="49.07" x2="55.51" y2="55.51"/></g></svg>',
            ],
            [
                'nama' => 'Kampar',
                'kode' => '14.71.10.1001',
                'waktu' => '15.40 WIB',
                'suhu' => 28,
                'kondisi' => 'Berawan Tebal',
                'icon' => '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><ellipse cx="40" cy="44" rx="16" ry="10" fill="#78909C"/><ellipse cx="28" cy="40" rx="14" ry="9" fill="#B0BEC5"/></svg>',
            ],
        ];
        $highlightBerita = [
            (object)[
                'id' => 'berita-1',
                'judul' => 'Stasiun Klimatologi Riau Luncurkan Sistem Peringatan Dini Terbaru',
                'isi' => 'Stasiun Klimatologi Riau resmi meluncurkan sistem peringatan dini terbaru untuk meningkatkan kesiapsiagaan masyarakat menghadapi cuaca ekstrem.',
                'gambar' => '/assets/images/berita2.png',
            ],
            (object)[
                'id' => 'berita-2',
                'judul' => 'Workshop Pelatihan Interpretasi Data Cuaca untuk Petani Riau',
                'isi' => 'BMKG Riau mengadakan workshop pelatihan interpretasi data cuaca untuk membantu petani memahami prakiraan cuaca dan meningkatkan hasil panen.',
                'gambar' => '/assets/images/berita2.png',
            ],
            (object)[
                'id' => 'berita-3',
                'judul' => 'BMKG Riau Gelar Sosialisasi Adaptasi Perubahan Iklim',
                'isi' => 'Sosialisasi adaptasi perubahan iklim digelar untuk meningkatkan pemahaman masyarakat tentang pentingnya mitigasi dan adaptasi iklim.',
                'gambar' => '/assets/images/berita2.png',
            ],
            (object)[
                'id' => 'berita-4',
                'judul' => 'Peringatan Dini Cuaca Ekstrem di Riau',
                'isi' => 'BMKG Riau mengeluarkan peringatan dini cuaca ekstrem yang berpotensi terjadi di beberapa wilayah Riau dalam waktu dekat.',
                'gambar' => '/assets/images/berita2.png',
            ],
        ];
        return view('masyarakat.index', compact('gempa', 'prakiraanCuacaRiau', 'highlightBerita'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBeritaArtikel extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita_artikel';

    protected $fillable = [
        'nama',
        'slug',
    ];

    public function berita()
    {
        return $this->hasMany(BeritaArtikel::class, 'kategori_id');
    }
}

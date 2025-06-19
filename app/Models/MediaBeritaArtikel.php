<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaBeritaArtikel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media_berita_artikel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'berita_artikel_id',
        'media_url',
        'tipe',
        'caption',
        'alt_text',
        'urutan',
    ];

    /**
     * Get the berita/artikel that owns the media.
     */
    public function beritaArtikel()
    {
        return $this->belongsTo(BeritaArtikel::class, 'berita_artikel_id');
    }
}

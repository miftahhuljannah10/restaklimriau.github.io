<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeritaArtikel extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'berita_artikel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis',
        'judul',
        'isi',
        'kategori_id',
        'penulis',
        'slug',
        'featured',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'featured' => 'boolean',
    ];

    /**
     * Get the category that owns the berita/artikel.
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriBeritaArtikel::class, 'kategori_id');
    }

    /**
     * Get the media for the berita/artikel.
     */
    public function media()
    {
        return $this->hasMany(MediaBeritaArtikel::class, 'berita_artikel_id');
    }

    /**
     * Get the thumbnail media.
     */
    public function thumbnail()
    {
        return $this->hasOne(MediaBeritaArtikel::class, 'berita_artikel_id')
            ->where('tipe', 'thumbnail')->orderBy('urutan');
    }

    /**
     * Get the header media.
     */
    public function header()
    {
        return $this->hasOne(MediaBeritaArtikel::class, 'berita_artikel_id')
            ->where('tipe', 'header')->orderBy('urutan');
    }

    /**
     * Get only gallery media.
     */
    public function galeri()
    {
        return $this->hasMany(MediaBeritaArtikel::class, 'berita_artikel_id')
            ->where('tipe', 'galeri')
            ->orderBy('urutan');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSurat extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_surat';
    protected $fillable = [
        'kode',
        'nama',
    ];

    public function suratKeluar()
    {
        return $this->hasMany(SuratKeluar::class, 'klasifikasi_id');
    }
}

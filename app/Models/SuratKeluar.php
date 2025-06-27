<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = [
        'no_surat',
        'klasifikasi_id',
        'tanggal_surat',
        'perihal',
        'tujuan',
        'sifat',
        'scanning',
        'catatan',
    ];

    public function klasifikasiSurat()
    {
        return $this->belongsTo(KlasifikasiSurat::class, 'klasifikasi_id');
    }
}

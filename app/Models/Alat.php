<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';

    protected $primaryKey = 'nomor_pos'; // karena bukan 'id'

    public $incrementing = false; // karena bukan auto increment

    protected $keyType = 'string'; // karena nomor_pos bertipe string

    protected $fillable = [
        'nomor_pos',
        'nama_pos',
        'jenis_alat',
        'kode_pos',
        'lintang',
        'bujur',
        'elevasi',
        'desa',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kondisi_alat',
        'kepemilikan_alat',
        'nama_penanggungjawab',
        'jabatan',
        'pengiriman_data',
        'ketersediaan_data',
        'keterangan_alat',
        'foto',
    ];
    // relasi ke tabel provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
    // relasi ke tabel kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
    // relasi ke tabel kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    // relasi ke tabel alat_curah_hujan
    public function curahHujan()
    {
        return $this->hasOne(AlatCurahHujan::class, 'nomor_pos', 'nomor_pos');
    }
}

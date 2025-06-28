<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlatCurahHujan extends Model
{
    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'alat_curah_hujan';

    /**
     * Kunci utama tabel.
     *
     * @var string
     */
    protected $primaryKey = 'nomor_pos';

    /**
     * Menunjukkan bahwa ID tidak auto increment.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Tipe data kunci utama.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Atribut yang dapat diisi (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor_pos',
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember'
    ];

    /**
     * Mendapatkan alat yang terkait dengan data curah hujan ini.
     */
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'nomor_pos', 'nomor_pos');
    }

    /**
     * Accessor untuk mendapatkan rata-rata curah hujan tahunan.
     * 
     * @return float|null
     */
    public function getRataRataAttribute()
    {
        $bulan = [
            'januari',
            'februari',
            'maret',
            'april',
            'mei',
            'juni',
            'juli',
            'agustus',
            'september',
            'oktober',
            'november',
            'desember'
        ];

        $total = 0;
        $count = 0;

        foreach ($bulan as $b) {
            if (!is_null($this->$b)) {
                $total += $this->$b;
                $count++;
            }
        }

        return $count > 0 ? $total / $count : null;
    }
}

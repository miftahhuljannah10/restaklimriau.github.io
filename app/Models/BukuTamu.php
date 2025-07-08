<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'buku_tamu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'asal',
        'tanggal_kunjungan',
        'keperluan',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'status' => 'string',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk filter berdasarkan tanggal kunjungan
     */
    public function scopeByDate($query, $date)
    {
        return $query->whereDate('tanggal_kunjungan', $date);
    }

    /**
     * Accessor untuk format tanggal kunjungan
     */
    public function getFormattedTanggalKunjunganAttribute()
    {
        return $this->tanggal_kunjungan ? $this->tanggal_kunjungan->format('d/m/Y') : null;
    }

    /**
     * Mutator untuk format nomor HP
     */
    public function setNoHpAttribute($value)
    {
        $this->attributes['no_hp'] = $value ? preg_replace('/[^0-9]/', '', $value) : null;
    }
}

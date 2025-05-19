<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'url_tabel';

    protected $fillable = [
        'url',
        'short_url',
        'menu_type',
        'deskripsi',
    ];

    public $timestamps = true;

    public static function getMenuTypes()
    {
        return [
            'nol_rupiah' => 'Link Nol Rupiah',
            'survey' => 'Link Survey',
        ];
    }
}

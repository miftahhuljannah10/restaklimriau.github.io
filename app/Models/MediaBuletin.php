<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaBuletin extends Model
{
    protected $table = 'media_buletin';

    protected $fillable = [
        'judul',
        'edisi',
        'image',
        'link',
        'penulis',
        'status',
    ];
}

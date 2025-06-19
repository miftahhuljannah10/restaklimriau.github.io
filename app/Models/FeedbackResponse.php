<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackResponse extends Model
{
    protected $fillable = ['ip_address'];

    public function answers()
    {
        return $this->hasMany(FeedbackAnswer::class);
    }
}

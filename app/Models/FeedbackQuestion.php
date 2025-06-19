<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackQuestion extends Model
{
    protected $fillable = ['question_text', 'is_active', 'order'];

    public function answers()
    {
        return $this->hasMany(FeedbackAnswer::class);
    }

    public function options()
    {
        return $this->hasMany(FeedbackQuestionOption::class)->orderBy('order');
    }
}

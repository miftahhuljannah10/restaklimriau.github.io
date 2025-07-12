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

    // Check if question has options (dropdown type)
    public function hasOptions()
    {
        return $this->options()->count() > 0;
    }

    // Get question type based on whether it has options
    public function getTypeAttribute()
    {
        return $this->hasOptions() ? 'dropdown' : 'text';
    }
}

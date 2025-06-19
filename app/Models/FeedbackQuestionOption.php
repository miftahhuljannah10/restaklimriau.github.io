<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackQuestionOption extends Model
{
    protected $fillable = ['feedback_question_id', 'option_text', 'order'];

    public function question()
    {
        return $this->belongsTo(FeedbackQuestion::class);
    }
}

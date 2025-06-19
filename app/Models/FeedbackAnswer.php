<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackAnswer extends Model
{
    protected $fillable = ['feedback_response_id', 'feedback_question_id', 'answer_text'];

    public function question()
    {
        return $this->belongsTo(FeedbackQuestion::class, 'feedback_question_id');
    }

    public function response()
    {
        return $this->belongsTo(FeedbackResponse::class, 'feedback_response_id');
    }
}

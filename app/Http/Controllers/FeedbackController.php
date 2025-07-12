<?php

namespace App\Http\Controllers;

use App\Models\FeedbackQuestion;
use App\Models\FeedbackResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $questions = FeedbackQuestion::where('is_active', true)
            ->with('options')
            ->orderBy('order')
            ->get();
        return view('admin.feedback.form', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'answers.*' => 'required|string|max:1000',
        ]);

        $response = FeedbackResponse::create([
            'ip_address' => $request->ip()
        ]);

        foreach ($request->answers as $questionId => $answerText) {
            $response->answers()->create([
                'feedback_question_id' => $questionId,
                'answer_text' => $answerText
            ]);
        }

        // Return JSON for AJAX requests
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Terima kasih atas feedback Anda!']);
        }

        return redirect()->back()->with('success', 'Terima kasih atas feedback Anda!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackResponse;
use Illuminate\Http\Request;

class FeedbackResponseController extends Controller
{
    public function index()
    {
        $responses = FeedbackResponse::with(['answers.question'])
            ->latest()
            ->paginate(10);
        return view('admin.feedback.responses.index', compact('responses'));
    }

    public function show(FeedbackResponse $response)
    {
        $response->load('answers.question');
        return view('admin.feedback.responses.show', compact('response'));
    }

    public function destroy(FeedbackResponse $response)
    {
        $response->delete();
        return redirect()->route('admin.feedback.responses.index')
            ->with('success', 'Feedback response deleted successfully');
    }
}

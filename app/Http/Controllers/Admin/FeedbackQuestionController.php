<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackQuestion;
use Illuminate\Http\Request;

class FeedbackQuestionController extends Controller
{
    public function index()
    {
        $questions = FeedbackQuestion::with('options')->orderBy('order')->get();
        return view('admin.feedback.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.feedback.questions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question_text' => 'required|string|max:1000',
            'order' => 'required|integer|min:0',
            'answer_type' => 'required|in:text,dropdown',
            'options' => 'required_if:answer_type,dropdown|array',
            'options.*' => 'required_if:answer_type,dropdown|string|max:255'
        ]);

        $data['is_active'] = $request->has('is_active');

        $question = FeedbackQuestion::create([
            'question_text' => $data['question_text'],
            'order' => $data['order'],
            'is_active' => $data['is_active']
        ]);

        if ($data['answer_type'] === 'dropdown' && !empty($data['options'])) {
            $optionsData = array_map(function ($optionText, $index) {
                return [
                    'option_text' => $optionText,
                    'order' => $index + 1
                ];
            }, $data['options'], array_keys($data['options']));

            $question->options()->createMany($optionsData);
        }

        return redirect()->route('admin.feedback.questions.index')
            ->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit(FeedbackQuestion $question)
    {
        $question->load('options');
        return view('admin.feedback.questions.edit', compact('question'));
    }

    public function update(Request $request, FeedbackQuestion $question)
    {
        $data = $request->validate([
            'question_text' => 'required|string|max:1000',
            'order' => 'required|integer|min:0',
            'answer_type' => 'required|in:text,dropdown',
            'options' => 'required_if:answer_type,dropdown|array',
            'options.*' => 'required_if:answer_type,dropdown|string|max:255'
        ]);

        $data['is_active'] = $request->has('is_active');

        $question->update([
            'question_text' => $data['question_text'],
            'order' => $data['order'],
            'is_active' => $data['is_active']
        ]);

        if ($data['answer_type'] === 'dropdown') {
            // Delete existing options
            $question->options()->delete();

            if (!empty($data['options'])) {
                $optionsData = array_map(function ($optionText, $index) {
                    return [
                        'option_text' => $optionText,
                        'order' => $index + 1
                    ];
                }, $data['options'], array_keys($data['options']));

                $question->options()->createMany($optionsData);
            }
        } else {
            // If switching from dropdown to text, remove all options
            $question->options()->delete();
        }

        return redirect()->route('admin.feedback.questions.index')
            ->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function toggle(FeedbackQuestion $question)
    {
        $question->is_active = !$question->is_active;
        $question->save();

        return redirect()->back()->with('success', 'Status pertanyaan berhasil diperbarui.');
    }

    public function destroy(FeedbackQuestion $question)
    {
        // Delete associated options
        $question->options()->delete();
        // Delete associated answers
        $question->answers()->delete();
        // Delete the question itself
        $question->delete();

        return redirect()->route('admin.feedback.questions.index')
            ->with('success', 'Pertanyaan berhasil dihapus.');
    }
}

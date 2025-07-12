<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeedbackQuestion;
use App\Models\FeedbackQuestionOption;

class FeedbackQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing feedback questions
        FeedbackQuestion::truncate();
        FeedbackQuestionOption::truncate();

        // Question 1: Purpose of visit (text input)
        $question1 = FeedbackQuestion::create([
            'question_text' => 'Apa tujuan utama Anda mengunjungi laman Stasiun Klimatologi Riau hari ini?',
            'order' => 1,
            'is_active' => true
        ]);

        // Question 2: Information found (dropdown)
        $question2 = FeedbackQuestion::create([
            'question_text' => 'Apakah Anda berhasil menemukan data atau informasi yang Anda cari?',
            'order' => 2,
            'is_active' => true
        ]);

        // Add options for question 2
        $options2 = [
            'Ya, saya menemukan semua yang saya cari',
            'Ya, sebagian besar yang saya cari',
            'Hanya menemukan sedikit yang saya cari',
            'Tidak, saya tidak menemukan yang saya cari',
            'Saya hanya sedang menjelajahi'
        ];

        foreach ($options2 as $index => $optionText) {
            FeedbackQuestionOption::create([
                'feedback_question_id' => $question2->id,
                'option_text' => $optionText,
                'order' => $index + 1
            ]);
        }

        // Question 3: Suggestions (textarea)
        $question3 = FeedbackQuestion::create([
            'question_text' => 'Saran & masukan untuk Stasiun Klimatologi Riau agar lebih baik:',
            'order' => 3,
            'is_active' => true
        ]);

        // Question 4: Rating (dropdown) - optional
        $question4 = FeedbackQuestion::create([
            'question_text' => 'Bagaimana penilaian Anda terhadap kemudahan penggunaan website ini?',
            'order' => 4,
            'is_active' => true
        ]);

        // Add options for question 4
        $options4 = [
            'Sangat mudah',
            'Mudah',
            'Cukup mudah',
            'Sulit',
            'Sangat sulit'
        ];

        foreach ($options4 as $index => $optionText) {
            FeedbackQuestionOption::create([
                'feedback_question_id' => $question4->id,
                'option_text' => $optionText,
                'order' => $index + 1
            ]);
        }
    }
}

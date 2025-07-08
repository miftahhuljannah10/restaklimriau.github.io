<?php

// Test untuk debugging masalah validasi feedback question
echo "=== Debug Feedback Question Validation ===\n\n";

// Simulasi data yang dikirim dari form
$request_data = [
    'question_text' => 'Apa warna favorit Anda?',
    'order' => 1,
    'answer_type' => 'dropdown',
    'options' => ['Merah', 'Biru', 'Hijau']
];

echo "Data yang dikirim:\n";
print_r($request_data);

// Simulasi validation rules
$rules = [
    'question_text' => 'required|string|max:1000',
    'order' => 'required|integer|min:0',
    'answer_type' => 'required|in:text,dropdown',
    'options' => 'required_if:answer_type,dropdown|array',
    'options.*' => 'required_if:answer_type,dropdown|string|max:255'
];

echo "\nRules:\n";
print_r($rules);

// Test array_map yang digunakan di controller
$optionsData = array_map(function ($optionText, $index) {
    return [
        'option_text' => $optionText,
        'order' => $index + 1
    ];
}, $request_data['options'], array_keys($request_data['options']));

echo "\nHasil array_map:\n";
print_r($optionsData);

// Test untuk mengecek tipe data
echo "\nTipe data dari options:\n";
foreach ($request_data['options'] as $key => $option) {
    echo "options[$key] = " . gettype($option) . " (" . $option . ")\n";
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackQuestionOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('feedback_question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feedback_question_id')->constrained()->onDelete('cascade');
            $table->string('option_text');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback_question_options');
    }
}

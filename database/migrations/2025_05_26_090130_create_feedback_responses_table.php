<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('feedback_responses', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback_responses');
    }
};

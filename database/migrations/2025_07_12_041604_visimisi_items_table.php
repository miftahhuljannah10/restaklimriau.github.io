<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visimisi_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('visimisi_sections')->onDelete('cascade');
            $table->text('content');
            $table->integer('order_number');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visimisi_items');
    }
};

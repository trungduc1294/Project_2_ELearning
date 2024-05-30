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
        Schema::create('exam_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('question_id'); // "question_id" is the foreign key that references the "id" column on the "exam_questions" table
            $table->string('option_text');
            $table->boolean('is_correct'); // 1 = correct, 0 = incorrect
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_options');
    }
};

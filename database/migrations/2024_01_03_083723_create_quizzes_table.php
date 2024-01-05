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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // question of the quiz
            $table->string('answer_a')->nullable(); // answer of the quiz
            $table->string('answer_b')->nullable(); // answer of the quiz
            $table->string('answer_c')->nullable(); // answer of the quiz
            $table->string('answer_d')->nullable(); // answer of the quiz
            $table->string('correct_answer')->nullable(); // correct answer of the quiz
            $table->integer('lesson_id')->nullable(); // lesson of the quiz
            $table->integer('course_id')->nullable(); // course of the quiz
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};

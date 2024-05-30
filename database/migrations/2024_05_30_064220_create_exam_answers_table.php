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
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('exam_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->string('answer_text')->nullable(); // text if the question is an essay, option_id if the question is multiple choice
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_answers');
    }
};

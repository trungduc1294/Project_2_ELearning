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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name of the course
            $table->string('description'); // description of the course
            $table->integer('category_id')->nullable(); // category id of the course
            $table->string('class')->nullable();
            $table->integer('number_of_lessons')->nullable(); // number of lessions
            $table->integer('number_of_students')->nullable(); // number of students
            $table->integer('duration')->nullable(); // duration of the course (minutes)
            $table->integer('teacher_id')->nullable(); // teacher id
            $table->string('reference_code')->nullable(); // reference code of the course
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

<?php

namespace App\Http\Controllers\StudentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request) {
        $course_id = $request->course_id;
        $lesson_id = $request->lesson_id;
        return view('pages.student.quiz.page-quiz', [
            'course_id' => $course_id,
            'lesson_id' => $lesson_id
        ]);
    }
}

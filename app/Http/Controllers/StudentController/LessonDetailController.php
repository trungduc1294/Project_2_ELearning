<?php

namespace App\Http\Controllers\StudentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonDetailController extends Controller
{
    public function index(Request $request) {
        $course_id = $request->course_id;
        $lesson_id = $request->lesson_id;
        return view('pages.student.lesson-detail.page-lesson-detail', [
            'course_id' => $course_id,
            'lesson_id' => $lesson_id
        ]);
    }
}

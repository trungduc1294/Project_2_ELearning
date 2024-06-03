<?php

namespace App\Http\Controllers\StudentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentExamController extends Controller
{
    public function showExamList(Request $request) {
        return view('pages.student.exam.page-student-exam-list', [
            'course_id' => $request->course_id,
        ]);
    }

    public function doExam(Request $request) {
        return view('pages.student.exam.page-student-do-exam', [
            'course_id' => $request->course_id,
            'exam_id' => $request->exam_id,
        ]);
    }

    public function reviewExam(Request $request) {
        return view('pages.student.exam.page-student-review-exam', [
            'course_id' => $request->course_id,
            'exam_id' => $request->exam_id,
        ]);
    }
}

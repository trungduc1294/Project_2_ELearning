<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function createExam(Request $request) {
        return view("pages.teacher.exam.page-create-exam", [
            "course_id" => $request->course_id,
        ]);
    }

    public function showExamList(Request $request) {
        return view('pages.teacher.exam.page-exam-list',[
            'course_id' => $request->course_id,
        ]);
    }

    public function showExamDetail(Request $request) {
        return view('pages.teacher.exam.page-exam-detail',[
            'course_id' => $request->course_id,
            'exam_id' => $request->exam_id,
        ]);
    }
}

<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index(Request $request) {
        return view("pages.teacher.documents.page-document", [
            'course_id' => $request->course_id,
            'lesson_id' => $request->lesson_id
        ]);
    }

    public function studentDocument(Request $request) {
        return view("pages.student.documents.page-student-document", [
            'course_id' => $request->course_id,
            'lesson_id' => $request->lesson_id
        ]);
    }
}

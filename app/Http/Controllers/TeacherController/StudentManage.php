<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentManage extends Controller
{
    public function index() {
        return view('pages.teacher.student-manage.page-student-manage', [
            'title' => 'Quiz Manage'
        ]);
    }

    public function getStudentManagePage(Request $request) {
        $course_id = $request->id;
        return view('pages.teacher.student-manage.page-student-manage', [
            'course_id' => $course_id
        ]);
    }
}

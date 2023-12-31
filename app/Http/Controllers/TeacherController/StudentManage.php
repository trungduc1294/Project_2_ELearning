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
}

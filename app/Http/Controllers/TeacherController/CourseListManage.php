<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseListManage extends Controller
{
    public function index() {
        return view("pages.teacher.courses-manage.courses-general");
    }
}

<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseDetailManage extends Controller
{
    public $courseId;
    public function index(Request $request) {
        $courseId = $request->id;
        return view("pages.teacher.courses-manage.course-detail", [
            'courseId' => $courseId,
        ]);
    }
}

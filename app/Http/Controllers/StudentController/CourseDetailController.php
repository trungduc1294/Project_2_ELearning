<?php

namespace App\Http\Controllers\StudentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseDetailController extends Controller
{
    public function index(Request $request) {
        $student_id = $request->student_id;
        $course_id = $request->course_id;
        return view('pages.student.course-detail.page-course-detail', [
            'student_id' => $student_id,
            'course_id' => $course_id
        ]);
    }
}

<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamListController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.teacher.exam.page-exam-list',[
            'course_id' => $request->course_id,
        ]);
    }
}

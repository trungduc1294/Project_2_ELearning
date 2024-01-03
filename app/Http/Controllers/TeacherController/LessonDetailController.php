<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LessonDetailController extends Controller
{
    public function index()
    {
        return view('pages.teacher.lesson-detail-manage.page-lesson-detail', [
            'title' => 'Lesson Detail Manage'
        ]);
    }
}

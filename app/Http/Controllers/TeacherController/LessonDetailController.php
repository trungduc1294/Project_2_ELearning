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

    public function getLessonDetailPage(Request $request) {
        return view('pages.teacher.lesson-detail-manage.page-lesson-detail', [
            'course_id' => $request->id,
            'lesson_id' => $request->lesson_id
        ]);
    }
}

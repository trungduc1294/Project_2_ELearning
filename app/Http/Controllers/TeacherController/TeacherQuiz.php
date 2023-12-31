<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherQuiz extends Controller
{
    public function index()
    {
        return view('pages.teacher.quiz.page-teacher-quiz', [
            'title' => 'Quiz Manage'
        ]);
    }
}

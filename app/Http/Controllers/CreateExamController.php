<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateExamController extends Controller
{
    public function index(Request $request) {
        return view("pages.teacher.exam.page-create-exam", [
            "course_id" => $request->course_id,
        ]);
    }
}

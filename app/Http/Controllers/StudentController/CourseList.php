<?php

namespace App\Http\Controllers\StudentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseList extends Controller
{
    public function index(Request $request) {
        $user_id = $request->id;
        return view('pages.student.my-library.page-mylibrary', ['user_id' => $user_id]);
    }
}

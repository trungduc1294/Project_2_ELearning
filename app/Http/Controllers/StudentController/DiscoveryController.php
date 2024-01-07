<?php

namespace App\Http\Controllers\StudentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscoveryController extends Controller
{
    public function index()
    {
        return view('pages.student.discover-course.page-discover-course');
    }
}

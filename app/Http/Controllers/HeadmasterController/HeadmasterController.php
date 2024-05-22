<?php

namespace App\Http\Controllers\HeadmasterController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadmasterController extends Controller
{
    public function index() {
        if (session('role') == 'headmaster') {
            return view("pages.headmaster.page-teacher-manage");
        } else {
            abort(403, "Unauthorized action.");
        }
    }
}

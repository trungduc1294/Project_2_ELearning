<?php

namespace App\Http\Controllers\ForumController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request) {
        return view("pages.both.forum");
    }
}

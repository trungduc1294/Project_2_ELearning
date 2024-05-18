<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeComplierController extends Controller
{
    public function index()
    {
        return view('pages.both.page-code-complier');
    }
}

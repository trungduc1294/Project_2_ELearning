<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Account extends Controller
{
    public function index(Request $request) {
        $id = $request->id;
        return view('pages.both.page-account', ['user_id' => $id]);
    }
}

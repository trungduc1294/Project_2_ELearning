<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-page');
    }

    public function logout()
    {
        session()->flush();
        return redirect("/login");
    }
}

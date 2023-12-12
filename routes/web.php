<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.landing-page.index');
});

// Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');

Route::get('/signup', function() {
    return view('auth.signup-page');
});

Route::get('/login', function() {
    return view('auth.login-page');
});


// View Router 
Route::get('/test-layout', function () {
    return view('pages.landing-page.after_login_layout');
});

Route::get('/my-library', function () {
    return view('pages.user.my-library.mylibrary');
});

Route::get('/course-detail', function () {
    return view('pages.user.course-detail.course-detail');
});

Route::get('/quiz-start', function () {
    return view('pages.user.quiz.quiz-start-page');
});

Route::get('/sign-up', function () {
    return view('pages.auth.signup');
});

// Teacher router
Route::get('/teacher/courses-list', function () {
    return view('pages.teacher.courses-manage.courses-general');
});

Route::get('/teacher/courses-detail', function () {
    return view('pages.teacher.courses-manage.course-detail');
});


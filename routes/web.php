<?php

use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\TeacherController\CourseDetailManage;
use App\Http\Controllers\TeacherController\CourseListManage;
use App\Http\Controllers\TeacherController\LessonDetailController;
use App\Http\Controllers\TeacherController\StudentManage;
use App\Http\Controllers\TeacherController\TeacherQuiz;

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

// ===================== Route for Auth =====================

// Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');

Route::get('/signup', function() {
    return view('auth.signup-page');
});

Route::get('/login', function() {
    return view('auth.login-page');
})->name('login');



Route::get('/logout', [LoginController::class,'logout'])->name('logout');

// ===================== Route for Teacher =====================
Route::get('/teacher/courses-list', [CourseListManage::class,'index'])->name('teacher.course');

Route::any('/teacher/courses-detail/{id}', [CourseDetailManage::class, 'index'])->name('teacher.course.detail');

Route::any('/teacher/lesson-detail-manage', [LessonDetailController::class, 'index'])->name('lesson-detail-manage'); // ???

Route::any('/teacher/student-manage', [StudentManage::class, 'index'])->name('student-manage');

Route::any('/teacher/courses-detail/{id}/student-manage', [StudentManage::class, 'getStudentManagePage'])->name('teacher.student.manage');

Route::any('/teacher/courses-detail/{id}/lesson-detail/{lesson_id}', [LessonDetailController::class, 'getLessonDetailPage'])->name('teacher.lesson.detail');

Route::any('/teacher/courses-detail/{course_id}/lesson-detail/{lesson_id}/quiz', [TeacherQuiz::class, 'getQuizDetailPage'])->name('teacher.quiz.manage');


// ===================== Route for Student =====================

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






// ===================== Route for Test =====================
Route::any('/test-lesson-layout', function () {
    return view('layouts.lesson-layout');
});


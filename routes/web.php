<?php

use App\Http\Controllers\Account;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\StudentController\CourseDetailController;
use App\Http\Controllers\StudentController\CourseList;
use App\Http\Controllers\StudentController\DiscoveryController;
use App\Http\Controllers\StudentController\LessonDetailController as StudentLessonDetailController;
use App\Http\Controllers\StudentController\QuizController;
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
})->name('home');

// ===================== Route for Auth =====================

// Route::get('/login', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');

Route::get('/signup', function() { return view('auth.signup-page'); })->name('signup');

Route::get('/login', function() { return view('auth.login-page'); })->name('login');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::any('/account/{id}', [Account::class, 'index'])->name('account');

// ===================== Route for Teacher =====================

Route::get('/teacher/courses-list', [CourseListManage::class,'index'])->name('teacher.course');

Route::any('/teacher/courses-detail/{id}', [CourseDetailManage::class, 'index'])->name('teacher.course.detail');

Route::any('/teacher/lesson-detail-manage', [LessonDetailController::class, 'index'])->name('lesson-detail-manage'); // ???

Route::any('/teacher/student-manage', [StudentManage::class, 'index'])->name('student-manage');

Route::any('/teacher/courses-detail/{id}/student-manage', [StudentManage::class, 'getStudentManagePage'])->name('teacher.student.manage');

Route::any('/teacher/courses-detail/{id}/lesson-detail/{lesson_id}', [LessonDetailController::class, 'getLessonDetailPage'])->name('teacher.lesson.detail');

Route::any('/teacher/courses-detail/{course_id}/lesson-detail/{lesson_id}/quiz', [TeacherQuiz::class, 'getQuizDetailPage'])->name('teacher.quiz.manage');

// ===================== Route for Student =====================

Route::any('/discovery', [DiscoveryController::class, 'index'])->name('discovery');

Route::any('/student/mylibrary/{id}', [CourseList::class, 'index'])->name('student.course');

Route::any('/student/{student_id}/course-detail/{course_id}', [CourseDetailController::class, 'index'])->name('student.course.detail');

Route::any('/student/course_detail/{course_id}/lesson_detail/{lesson_id}', [StudentLessonDetailController::class, 'index'])->name('student.lesson.detail');

Route::any('/student/course_detail/{course_id}/lesson_detail/{lesson_id}/quiz', [QuizController::class, 'index'])->name('student.quiz.manage');

// Route::get('/user/my-library', function () {
//     return view('pages.student.my-library.mylibrary');
// });

Route::get('/course-detail', function () {
    return view('pages.student.course-detail.course-detail');
});

Route::get('/quiz-start', function () {
    return view('pages.student.quiz.quiz-start-page');
});


// ===================== Route for Test =====================
Route::any('/test-lesson-layout', function () {
    return view('layouts.lesson-layout');
});


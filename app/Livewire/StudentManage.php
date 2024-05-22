<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\User;
use Livewire\Component;

class StudentManage extends Component
{
    // variable received from the route 
    public $course_id;
    public $course;
    public $category_name;

    // add student
    public $newStudentEmail;
    public $listStudent = [];
    public $listRequestStudent = [];
    public $listRequest = [];

    // ==================== SYSTEM FUNCTION ====================
    // system function 
    public function fetchData() {
        $this->course = Course::find($this->course_id);
        $this->category_name = Category::find($this->course->category_id)->name;
        $this->getListUser();
        $this->getListRequestStudent();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.student-manage.student-manage');
    }

    // ==================== HELPER FUNCTION ====================
    public function getListUser() {
        $listStudentId = CourseStudent::where('course_id', $this->course_id)
            ->where('status', '!=', 'requesting')
            ->get();

        if ($listStudentId) {
            $this->listStudent = [];
            foreach ($listStudentId as $studentId) {
                $student = User::find($studentId->student_id);
                array_push($this->listStudent, $student);
            }
        }
    }

    public function getListRequestStudent() {
        $listRequest = CourseStudent::where('course_id', $this->course_id)
            ->where('status', 'requesting')
            ->get();
            
        $this->listRequest = $listRequest;

        if ($listRequest) {
            $this->listRequestStudent = [];
            foreach ($listRequest as $request) {
                $student = User::find($request->student_id);
                array_push($this->listRequestStudent, $student);
            }
        }

        // dd($this->listRequestStudent);
    }

    // ==================== MAIN FUNCTION ====================
    // add student with email function
    public function addStudent() {
        $student = User::where('email', $this->newStudentEmail)->first();
        $checkStudentExisted = CourseStudent::where('course_id', $this->course_id)->where('student_id', $student->id)->first();

        if ($student && !$checkStudentExisted) {
            $course_student = new CourseStudent();
            $course_student->course_id = $this->course_id;
            $course_student->student_id = $student->id;
            $course_student->status = "joined";
            $course_student->save();

            $course = Course::find($this->course_id);
            $course->number_of_students += 1;
            $course->save();
        }

        $this->fetchData();
    }

    // delete student function
    public function deleteStudent($studentId) {
        $deteleStudentId = CourseStudent::where('course_id', $this->course_id)->where('student_id', $studentId)->first();
        $deteleStudentId->delete();

        $course = Course::find($this->course_id);
        $course->number_of_students -= 1;
        $course->save();

        $this->fetchData();
    }

    public function banStudent($studentId) {
        $banStudent = CourseStudent::where('course_id', $this->course_id)->where('student_id', $studentId)->first();

        if($banStudent->status == "joined") {
            $banStudent->status = "banned";
        } else {
            $banStudent->status = "joined";
        }
        $banStudent->save();

        $this->fetchData();
    }

    // public function checkBanned($studentId) {
    //     $checkStudent = CourseStudent::where('course_id', $this->course_id)->where('student_id', $studentId)->first();
    //     if($checkStudent->status == "banned") {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function acceptStudent($courseStudentId) {
        $acceptStudent = CourseStudent::where('id', $courseStudentId)->first();
        $acceptStudent->status = "joined";
        $acceptStudent->save();

        $course = Course::find($this->course_id);
        $course->number_of_students += 1;
        $course->save();

        $this->fetchData();
    }

    public function removeRequest($courseStudentId) {
        $courseStudent = CourseStudent::where('id', $courseStudentId)->first();
        $courseStudent->delete();
        $this->fetchData();
    }
}

<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\User;
use Livewire\Component;

class StudentManage extends Component
{
    // variable received from the route 
    public $course_id;
    public $course;

    // add student
    public $newStudentEmail;
    public $listStudent = [];

    public function getListUserId() {
        $listStudentId = CourseStudent::where('course_id', $this->course_id)->get();
        if ($listStudentId) {
            $this->listStudent = [];
            foreach ($listStudentId as $studentId) {
                $student = User::find($studentId->student_id);
                array_push($this->listStudent, $student);
            }
        }
    }

    // system function 
    public function fetchData() {
        $this->course = Course::find($this->course_id);
        $this->getListUserId();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.student-manage.student-manage');
    }

    // add student function
    public function addStudent() {
        $student = User::where('email', $this->newStudentEmail)->first();
        $checkStudentExisted = CourseStudent::where('course_id', $this->course_id)->where('student_id', $student->id)->first();

        if ($student && !$checkStudentExisted) {
            $course_student = new CourseStudent();
            $course_student->course_id = $this->course_id;
            $course_student->student_id = $student->id;
            $course_student->save();
        }

        $this->fetchData();
    }

    // delete student function
    public function deleteStudent($studentId) {
        $deteleStudentId = CourseStudent::where('course_id', $this->course_id)->where('student_id', $studentId)->first();
        $deteleStudentId->delete();

        $this->fetchData();
    }
}

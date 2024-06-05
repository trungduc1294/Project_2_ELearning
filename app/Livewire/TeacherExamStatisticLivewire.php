<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Exam;
use App\Models\User;
use Livewire\Component;

class TeacherExamStatisticLivewire extends Component
{
    public $course_id;
    public $course;
    public $exam_id;
    public $exam;

    public $listStudent;

    public function fetchData() {

    }
    public function mount() {
        $this->course = Course::find($this->course_id);
        $this->exam = Exam::find($this->exam_id);
        $this->listStudent = $this->getListStudentOfCourse();
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.teacher.exam.teacher-exam-statistic-livewire');
    }

    // ============================= CUS FUCNT =============================
    public function getListStudentOfCourse() {
        $listStudent = [];
        $listStudentId = CourseStudent::where('course_id', $this->course_id)->pluck('student_id')->toArray();
        foreach ($listStudentId as $studentId) {
            $student = User::find($studentId);
            $listStudent[] = $student;
        }
        return $listStudent;
    }
}

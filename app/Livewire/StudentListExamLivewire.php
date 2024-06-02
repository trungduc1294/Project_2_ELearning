<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Exam;
use Livewire\Component;

class StudentListExamLivewire extends Component
{
    public $course_id;
    public $course;
    public $exams;

    public function fetchData() {
        $this->exams = $this->getAllExamOfCourse($this->course_id);
    }
    public function mount() {
        $this->course = $this->getCourseById($this->course_id);
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.student.exam.student-list-exam-livewire');
    }

    // ======================= CUS FUNCTION =======================
    public function getAllExamOfCourse($course_id) {
        return Exam::where('course_id', $course_id)->get();
    }
    public function getCourseById($course_id) {
        return Course::find($course_id);
    }
}

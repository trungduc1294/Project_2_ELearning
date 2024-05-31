<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use Livewire\Component;

class ListExamLivewire extends Component
{
    public $course_id;
    public $course;
    public $teacher;

    // list of exam
    public $exams;

    public function fetchData() {
        $this->exams = $this->getAllCourseExam();
    }
    public function mount() {
        $this->course = $this->getCourse();
        $this->teacher = $this->getTeacher();
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.teacher.exam.list-exam-livewire');
    }

    // ========================= CUS FUNC =========================
    public function getAllCourseExam() {
        return Exam::where('course_id', $this->course_id)->get();
    }
    public function getCourse() {
        return Course::find($this->course_id);
    }
    public function getTeacher() {
        return User::find($this->course->teacher_id);
    }
    public function deleteExam($exam_id) {
        $exam = Exam::find($exam_id);
        $exam->delete();
        $this->fetchData();
        $this->dispatch('swal', title: 'Xóa bài kiểm tra thành công.', type: 'success');
    }
}

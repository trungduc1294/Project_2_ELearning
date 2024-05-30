<?php

namespace App\Livewire;

use App\Models\Exam;
use App\Models\User;
use Livewire\Component;

class CreateExamLivewire extends Component
{
    public $course_id;
    public $teacher;

    // exams
    public $exam_title;
    public $exam_description;
    public $exam_start_time;
    public $exam_end_time;


    public $question_type;

    public function fetchData() {
        $this->teacher = User::where('id', session('userId'))->first();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.exam.create-exam-livewire');
    }

    // ====================== CREATE EXAM ======================
    public function createExam() {
        // $this->validate([
        //     'exam_title' => 'required',
        //     'exam_description' => 'required',
        //     'exam_start_time' => 'required',
        //     'exam_end_time' => 'required',
        // ]);

        // $exam = new Exam();
        // $exam->course_id = $this->course_id;
        // $exam->teacher_id = $this->teacher->id;
        // $exam->title = $this->exam_title;
        // $exam->description = $this->exam_description;
        // $exam->start_time = $this->exam_start_time;
        // $exam->end_time = $this->exam_end_time;
        // $exam->save();

        // $this->reset('exam_title', 'exam_description', 'exam_start_time', 'exam_end_time');
        // session()->flash('message', 'Exam created successfully.');

        $this->dispatch('swal', title: 'Tạo bài kiểm tra thành công.', type: 'success');
    }
}

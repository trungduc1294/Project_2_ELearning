<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class StdQuiz extends Component
{
    public $course_id;
    public $lesson_id;

    // ========================================== MODEL VARIABLE ==========================================
    public $quizList;

    // ========================================== SYSTEM FUNCTION ==========================================
    public function fetchData() {
        $this->quizList = Quiz::where('course_id', $this->course_id)->where('lesson_id', $this->lesson_id)->get();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.student.quiz.std-quiz');
    }

    // ========================================== CUSTOM FUNCTION ==========================================
}

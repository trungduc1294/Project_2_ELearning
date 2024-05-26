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
    public $result;

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
    public function returnAnswer($answer, $quiz_id) {
        $quiz = Quiz::find($quiz_id);
        if ($quiz->correct_answer == $answer) {
            $this->result = [
                'status' => 'correct',
                'answer' => $quiz->correct_answer,
                'quiz_id' => $quiz->id
            ];
        } else {
            $this->result = [
                'status' => 'wrong',
                'answer' => $quiz->correct_answer,
                'quiz_id' => $quiz->id
            ];
        }
        $this->dispatch('selected:answer',answer: $answer, quiz_id: $quiz_id);
    }
}

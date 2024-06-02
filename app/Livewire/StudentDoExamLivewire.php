<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamOption;
use App\Models\ExamQuestion;
use Livewire\Component;

class StudentDoExamLivewire extends Component
{
    public $course_id;
    public $course;
    public $exam_id;
    public $exam;

    // list question of exam
    public $questions;

    public function fetchData() {
        $this->questions = $this->getAllQuestionByExamId($this->exam_id);
    }

    public function mount() {
        $this->exam = $this->getExamById($this->exam_id);
        $this->course = $this->getCourseById($this->course_id);
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.student.exam.student-do-exam-livewire');
    }

    // ============================= CUS FUCNT =============================
    public function getExamById($id) {
        return Exam::find($id);
    }
    public function getCourseById($id) {
        return Course::find($id);
    }

    // Get list question of exam
    public function getAllQuestionByExamId($exam_id) {
        $questions = [];
        $examQuestions = ExamQuestion::where('exam_id', $exam_id)->get();

        foreach ($examQuestions as $examQuestion) {
            $options = ExamOption::where('question_id', $examQuestion->id)->select('option_text', 'is_correct')->get();

            $options_text = $options->pluck('option_text')->toArray();
            $correct_answer = $options->pluck('is_correct')->toArray();
            
            $questions[] = [
                'id' => $examQuestion->id,
                'question_text' => $examQuestion->question_text,
                'question_type' => $examQuestion->question_type,
                'options_text' => $options_text,
                'correct_answer' => $correct_answer,
            ];
        }
        return $questions;
    }
}

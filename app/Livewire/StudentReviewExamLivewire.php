<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamOption;
use App\Models\ExamQuestion;
use App\Models\ExamScore;
use Livewire\Component;

class StudentReviewExamLivewire extends Component
{
    public $exam_id;
    public $exam;
    public $course_id;
    public $course;
    public $student_id;

    public $questions;
    public $temp_score;
    public $teacherGiveScore;
    
    public function fetchData() {
        $this->questions = $this->getAllQuestionByExamId($this->exam_id);
    }
    public function mount() {
        $this->exam = $this->getExamById($this->exam_id);
        $this->course = $this->getCourseById($this->course_id);
        $this->student_id = session('userId');
        $this->fetchData();

        // count score
        $this->countTempScore();
        $this->teacherGiveScore = $this->getTeacherScore();
    }
    
    public function render()
    {
        return view('livewire.student.exam.student-review-exam-livewire');
    }

    // ============================= CUS FUCNT =============================
    public function getExamById($id) {
        return Exam::find($id);
    }
    public function getCourseById($id) {
        return Course::find($id);
    }

    public function getAllQuestionByExamId($exam_id) {
        $questions = [];
        $examQuestions = ExamQuestion::where('exam_id', $exam_id)->get();

        foreach ($examQuestions as $examQuestion) {
            $options = ExamOption::where('question_id', $examQuestion->id)->select('option_text', 'is_correct')->get();

            $options_text = $options->pluck('option_text')->toArray();
            // $user_answer = $options->pluck('is_correct')->toArray();
            $user_answer = $this->getUserAnswer($examQuestion->id, $this->student_id);
            $answer_text = isset($user_answer[0]['answer_text']) ? $user_answer[0]['answer_text'] : null;

            $this->isCorrect($examQuestion->id, $answer_text);
            
            $questions[] = [
                'id' => $examQuestion->id,
                'question_text' => $examQuestion->question_text,
                'question_type' => $examQuestion->question_type,
                'options_text' => $options_text,
                'user_answer' => $answer_text,
                'is_correct' => $this->isCorrect($examQuestion->id, $answer_text),
            ];
        }
        return $questions;
    }

    public function getUserAnswer($question_id, $student_id) {
        $user_answer = ExamAnswer::where('question_id', $question_id)
            ->where('student_id', $student_id)
            ->get('answer_text');
        return $user_answer;
    }

    public function isCorrect($question_id, $user_answer_text) {
        $correct_answer = ExamOption::where('question_id', $question_id)
            ->where('is_correct', 1)
            ->get('option_text');
        if($correct_answer[0]['option_text'] == $user_answer_text) {
            return true;
        }
        return false;
    }

    public function countTempScore() {
        $score = 0;
        foreach ($this->questions as $question) {
            if($question['is_correct']) {
                $score++;
            }
        }
        $temp_score = new ExamScore();
        $temp_score->student_id = $this->student_id;
        $temp_score->exam_id = $this->exam_id;
        $temp_score->temp_score = $score;
        $temp_score->save();

        $this->temp_score = $score;
    }

    public function getTeacherScore() {
        $examScore = ExamScore::where('student_id', $this->student_id)
            ->where('exam_id', $this->exam_id)
            ->first();
        if($examScore->score != null) {
            return $examScore->score;
        } else {
            return null;
        }
    }

    // public function submitTeacherScore() {
    //     $examScore = ExamScore::where('student_id', $this->student_id)
    //         ->where('exam_id', $this->exam_id)
    //         ->first();
    //     $examScore->score = $this->teacherGiveScore;
    //     $examScore->save();
    //     $this->dispatch('swal', title: 'Chấm điểm thành công', type: 'success');
    // }
    
}

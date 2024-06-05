<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class StdQuiz extends Component
{
    public $course_id;
    public $lesson_id;

    // ========================================== MODEL VARIABLE ==========================================
    public $quizList;
    public $quizList_index = 0;
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

        $this->checkQuizCorrect();
        $this->countCorrectAnswer($quiz_id, $this->result);
    }

    public function nextQuiz() {
        if ($this->quizList_index < count($this->quizList) - 1) {
            $this->quizList_index++;
        } else {
            $this->dispatch('swal', title: 'Không có câu hỏi nào nữa.', type: 'error');
        }
        $this->reset('result');
    }

    public function prevQuiz() {
        if ($this->quizList_index > 0) {
            $this->quizList_index--;
        } else {
            $this->dispatch('swal', title: 'Không có câu hỏi nào nữa.', type: 'error');
        }
        $this->reset('result');
    }

    public function checkQuizCorrect() {
        if ($this->result['status'] == 'correct') {
            $this->dispatch('swal', title: 'Chúc mừng bạn đã trả lời đúng.', type: 'success');
        } else {
            $this->dispatch('swal', title: 'Rất tiếc, câu trả lời của bạn không chính xác.', type: 'error');
        }
    }

}

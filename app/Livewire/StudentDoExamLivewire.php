<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamOption;
use App\Models\ExamQuestion;
use Livewire\Component;

class StudentDoExamLivewire extends Component
{
    public $course_id;
    public $course;
    public $student_id;
    public $exam_id;
    public $exam;
    public $start_time;
    public $end_time;

    // list question of exam
    public $questions;
    public $submited_answers_index = []; // xét theo index của array, nếu đã submit thì array index = true

    // submit exam answer
    public $answers = []; // array of answer, key of questions array => answer
    public $score;

    public function fetchData() {
        $this->questions = $this->getAllQuestionByExamId($this->exam_id);
    }

    public function mount() {
        $this->exam = $this->getExamById($this->exam_id);
        $this->course = $this->getCourseById($this->course_id);
        $this->student_id = session('userId');
        $this->start_time = $this->exam->start_time;
        $this->end_time = $this->exam->end_time;
        $this->fetchData();

        // Khởi tạo mảng submit answer có số phần tử bằng số câu hỏi của bài thi và giá trị mặc định là false
        $this->submited_answers_index = array_fill(0, count($this->questions), false);
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

    // Submit exam answer

    public function submitAnswer($question_id, $index_array) {
        if (!isset($this->answers[$index_array])) {
            $this->dispatch('swal', title: 'Điền đáp án trước khi nạp', type: 'error');
            return;
        } else if ($this->answers[$index_array] == '') {
            $this->dispatch('swal', title: 'Điền đáp án trước khi nạp', type: 'error');
            return;
        }

        $examAnswer = ExamAnswer::where('exam_id', $this->exam_id)
                                ->where('student_id', $this->student_id)
                                ->where('question_id', $question_id)
                                ->first();
        if (!$examAnswer) {
            $examAnswer = new ExamAnswer();
        }
        $examAnswer->exam_id = $this->exam_id;
        $examAnswer->student_id = $this->student_id;
        $examAnswer->question_id = $question_id;
        $examAnswer->answer_text = $this->answers[$index_array];
        $examAnswer->save();

        $this->fetchData();

        // Set submited answer
        $this->updateSubmitedAnswersIndex($index_array);

        $this->dispatch('swal', title: 'Nạp đáp án thành công', type: 'success');
    }

    public function updateSubmitedAnswersIndex($index) {
        $this->submited_answers_index[$index] = false;
    }

    public function endExam() {
        // change route to statistical exam
    }
}

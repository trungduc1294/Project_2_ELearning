<?php

namespace App\Livewire;

use App\Models\Exam;
use App\Models\ExamOption;
use App\Models\ExamQuestion;
use App\Models\User;
use Livewire\Component;

class CreateExamLivewire extends Component
{
    public $course_id;
    public $teacher;

    // exams
    public $is_exam_created = false;
    public $current_exam;
    public $exam_title;
    public $exam_description;
    public $exam_start_time;
    public $exam_end_time;

    // questions
    public $question_text; // cau hoi
    public $text_answer; // cau tra loi text
    public $question_type;
    public $multi_choice_answers = ['', '', '', ''];
    public $selected_answer;

    // list created questions
    public $questions = [];
    

    public function fetchData() {
        $this->teacher = User::where('id', session('userId'))->first();
        
        $this->getAllQuestion();
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
        if ($this->exam_title == '') {
            $this->dispatch('swal', title: 'Vui lòng nhập tiêu đề bài kiểm tra.', type: 'error');
            return;
        }

        if ($this->exam_description == '') {
            $this->dispatch('swal', title: 'Vui lòng nhập mô tả bài kiểm tra.', type: 'error');
            return;
        }

        if ($this->exam_start_time == '') {
            $this->dispatch('swal', title: 'Vui lòng chọn thời gian bắt đầu.', type: 'error');
            return;
        }

        if ($this->exam_end_time == '') {
            $this->dispatch('swal', title: 'Vui lòng chọn thời gian kết thúc.', type: 'error');
            return;
        }

        // check start time < end time
        $start = new \DateTime($this->exam_start_time);
        $end = new \DateTime($this->exam_end_time);
        if ($start > $end) {
            $this->dispatch('swal', title: 'Thời gian bắt đầu phải trước thời gian kết thúc.', type: 'error');
            return;
        }

        $exam = new Exam();
        $exam->course_id = $this->course_id;
        $exam->create_by = $this->teacher->id;
        $exam->title = $this->exam_title;
        $exam->description = $this->exam_description;
        $exam->start_time = $this->exam_start_time;
        $exam->end_time = $this->exam_end_time;
        $exam->save();

        $this->current_exam = $exam;
        $this->is_exam_created = true;

        $this->dispatch('swal', title: 'Tạo bài kiểm tra thành công.', type: 'success');
    }

    public function updateExam() {
        $exam = Exam::find($this->current_exam->id);
        $exam->title = $this->exam_title;
        $exam->description = $this->exam_description;
        $exam->start_time = $this->exam_start_time;
        $exam->end_time = $this->exam_end_time;
        $exam->save();

        $this->dispatch('swal', title: 'Cập nhật bài kiểm tra thành công.', type: 'success');
    }


    // ====================== CREATE QUESTION ======================
    public function createQuestion() {
        if ($this->current_exam) {
            if ($this->question_type == 0) {
                $this->dispatch('swal', title: 'Vui lòng chọn loại câu hỏi.', type: 'error');
            }else if ($this->question_type == 'text' || $this->question_type == 'long_text') {
                $this->createTextQuestion();
            } else if ($this->question_type == 'multiple_choice') {
                $this->createMultipleChoiceQuestion();
            }
            $this->fetchData();
        } else {
            $this->dispatch('swal', title: 'Vui lòng tạo bài kiểm tra trước.', type: 'error');
        }
    }

    public function createTextQuestion() {
        $question = new ExamQuestion();
        $question->exam_id = $this->current_exam->id;
        $question->question_text = $this->question_text;
        $question->question_type = $this->question_type;
        $question->save();

        $answer = new ExamOption();
        $answer->question_id = $question->id;
        $answer->option_text = $this->text_answer;
        $answer->is_correct = true;
        $answer->save();

        $this->reset(['question_text', 'text_answer', 'question_type']);

        $this->dispatch('swal', title: 'Tạo câu hỏi thành công.', type: 'success');
    }
    
    public function createMultipleChoiceQuestion() {
        $question = new ExamQuestion();
        $question->exam_id = $this->current_exam->id;
        $question->question_text = $this->question_text;
        $question->question_type = 'multiple_choice';
        $question->save();

        for ($i = 0; $i < 4; $i++) {
            $answer = new ExamOption();
            $answer->question_id = $question->id;
            $answer->option_text = $this->multi_choice_answers[$i];
            $answer->is_correct = $this->selected_answer == $i ? true : false;
            $answer->save();
        }

        $this->reset(['question_text', 'multi_choice_answers', 'selected_answer', 'question_type']);

        $this->dispatch('swal', title: 'Tạo câu hỏi thành công.', type: 'success');
    }

    public function deleteQuestionById($question_id) {
        ExamQuestion::find($question_id)->delete();
        $this->fetchData();
        $this->dispatch('swal', title: 'Xóa câu hỏi thành công.', type: 'success');
    }

    // ====================== SHOW QUESTION LIST ======================
    public function getAllQuestion() {
        $this->questions = [];
        if ($this->current_exam) {
            $examQuestions = ExamQuestion::where('exam_id', $this->current_exam->id)->get();

            foreach ($examQuestions as $examQuestion) {
                $options = ExamOption::where('question_id', $examQuestion->id)->select('option_text', 'is_correct')->get();

                $options_text = $options->pluck('option_text')->toArray();
                $correct_answer = $options->pluck('is_correct')->toArray();
                
                $this->questions[] = [
                    'id' => $examQuestion->id,
                    'question_text' => $examQuestion->question_text,
                    'question_type' => $examQuestion->question_type,
                    'options_text' => $options_text,
                    'correct_answer' => $correct_answer,
                ];
            }
        }
    }
}

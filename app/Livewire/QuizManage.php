<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use Livewire\Component;

class QuizManage extends Component
{
    // variable receive from route and get from blade page-teacher-quiz
    public $course_id;
    public $lesson_id;
    public $course;
    public $lesson;

    // add new question quiz
    public $newQuestion;
    public $newAnswerA;
    public $newAnswerB;
    public $newAnswerC;
    public $newAnswerD;
    public $newCorrectAnswer;

    // quiz list
    public $quizList;

    // use a variable to lissen event click to a quizdiv and show modal
    // return that quiz id to update quiz
    public $quizUpdateId;


    // system function
    public function fetchData() {
        $this->course = Course::find($this->course_id);
        $this->lesson = Lesson::find($this->lesson_id);
        $this->quizList = Quiz::where('lesson_id', $this->lesson_id)->get();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.quiz-manage.quiz-manage');
    }

    // add new question quiz
    public function addQuestion() {
        $this->validate([
            'newQuestion' => 'required',
            'newAnswerA' => 'required',
            'newAnswerB' => 'required',
            'newAnswerC' => 'required',
            'newAnswerD' => 'required',
            'newCorrectAnswer' => 'required',
        ]);

        $newQuiz = new Quiz();
        $newQuiz->question = $this->newQuestion;
        $newQuiz->answer_a = $this->newAnswerA;
        $newQuiz->answer_b = $this->newAnswerB;
        $newQuiz->answer_c = $this->newAnswerC;
        $newQuiz->answer_d = $this->newAnswerD;
        $newQuiz->correct_answer = $this->newCorrectAnswer;
        $newQuiz->lesson_id = $this->lesson_id;
        $newQuiz->course_id = $this->course_id;
        $newQuiz->save();
        
        $this->fetchData();
    }

    // delete question quiz
    public function deleteQuestion($id) {
        $quiz = Quiz::find($id);
        $quiz->delete();

        $this->fetchData();
    }
}

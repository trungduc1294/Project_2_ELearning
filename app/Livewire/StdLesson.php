<?php

namespace App\Livewire;

use App\Helpers\UserHelper;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Livewire\Component;

class StdLesson extends Component
{
    // variable receive from controller
    public $course_id;
    public $lesson_id;
    public $student_id;

    // ===================== MODEL VARIABLES =====================
    public $course;
    public $lesson;
    public $student;
    public $lessonList;
    public $commentList;

    public $addComment;

    // ===================== SYSTEM FUCNTION =====================
    public function fetchData() {
        $this->student_id = session('userId');

        $this->course = Course::find($this->course_id);
        $this->lesson = Lesson::find($this->lesson_id);
        $this->student = User::find($this->student_id);
        $this->lessonList = Lesson::where('course_id', $this->course_id)->get();
        $this->commentList = Comment::where('lesson_id', $this->lesson_id)->get();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.student.lesson.std-lesson');
    }

    // ===================== CUSTOM FUNCTION =====================
    public function storeNewComment() {
        if ($this->addComment != "") {
            $newComment = new Comment();
            $newComment->user_id = $this->student_id;
            $newComment->user_name = $this->student->username;
            $newComment->lesson_id = $this->lesson_id;
            $newComment->comment_content = $this->addComment;
            $newComment->save();

            // add rankpoint to student
            UserHelper::addPoint($this->student, 10);

            $this->addComment = '';
            $this->fetchData();
            $this->dispatch('swal', title: 'Đã thêm bình luận.', type: 'success');
        }
    }

    public function doExercise() {
        // add rankpoint to student
        UserHelper::addPoint($this->student, 30);
    }

    public function endVideo() {
        dd("end video");
        $this->dispatch("swal", title:"Diem ranking +30", type:"success");
    }
}

<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Livewire\Component;

class LessonDetailManage extends Component
{
    // nhan da ta tu livewire teacher-lesson-list.blade.php
    public $course_id;
    public $course; //lay course tu course_id
    public $lessonList; //lay lessonList tu course_id


    public $lesson_id; // ID cua lesson hien tai
    public $lesson; //lay lesson tu lesson_id
    public $teacher; //teacher of this course


    // Model variables
    public $addComment;
    public $lessonDescription;
    public $lessonName;

    // Livewire variables
    public $listComment;

    public function fetchData() {
        $this->course = Course::find($this->course_id);
        $this->lessonList = Lesson::where('course_id', $this->course_id)->get();
        $this->lesson = Lesson::find($this->lesson_id);
        $this->teacher = User::find($this->course->teacher_id);
        $this->listComment = Comment::where('lesson_id', $this->lesson_id)->get();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.lesson-detail-manage.lesson-detail-manage');
    }

    public function storeAddComment() {
        if ($this->addComment != "") {
            $comment = new Comment();
            $comment->user_id = session('userId');
            $comment->user_name = $this->teacher->username;
            $comment->lesson_id = $this->lesson_id;
            $comment->comment_content = $this->addComment;
            $comment->save();

            $this->addComment = "";
            $this->fetchData();
        }
    }

    public function updateLessonInfo() {

        $lesson = Lesson::find($this->lesson_id);
        $lesson->name = $this->lessonName;
        $lesson->description = $this->lessonDescription;
        $lesson->save();

        // reset model
        $this->lessonName = "";
        $this->lessonDescription = "";

        $this->fetchData();
    }
}

<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonDetailManage extends Component
{
    use WithFileUploads;

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


    public $video;
    public $videoUrl;

    // ==================== SYSTEM FUNCTION ====================

    public function fetchData() {
        $this->course = Course::find($this->course_id);
        $this->lessonList = Lesson::where('course_id', $this->course_id)->get();
        $this->lesson = Lesson::find($this->lesson_id);
        $this->teacher = User::find($this->course->teacher_id);
        $this->listComment = Comment::where('lesson_id', $this->lesson_id)->get();
    }

    public function mount() {
        $this->fetchData();

        $this->lessonName = $this->lesson->name;
        $this->lessonDescription = $this->lesson->description;
    }

    public function render()
    {
        return view('livewire.teacher.lesson-detail-manage.lesson-detail-manage');
    }

    // ==================== HELPER FUNCTION ====================

    // ==================== MAIN FUNCTION ====================
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

    public function uploadVideo() {
        $this->validate([
            'video' => 'required|mimes:mp4|max:102400',
        ]);

        // handle the file upload
        $path = $this->video->store('videos', 'public');

        // generate the url
        $this->videoUrl = Storage::url($path);

        // save the file path in the database
        $lesson = Lesson::find($this->lesson_id);
        $lesson->video_url = $this->videoUrl;
        $lesson->save();

        // reset lesson
        $this->fetchData();

        session()->flash('message', 'Video uploaded successfully.');
        $this->dispatch('swal', title: 'Video uploaded successfully.', type: 'success');
    }
}

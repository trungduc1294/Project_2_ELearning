<?php

namespace App\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class TeacherLessonList extends Component
{
    // add new lesson: wire:model data
    public $courseId;
    public $newLessonName;
    public $newLessonDescription;

    // Lesson list
    public $lessonList;

    public function render()
    {
        return view('livewire.teacher.teacher-lesson-list');
    }

    public function fetchData () {
        $this->lessonList = Lesson::where('course_id', $this->courseId)->get();
    }

    public function mount () {
        $this->fetchData();
    }

    public function addNewLesson() {
        $lesson = new Lesson;
        $lesson->course_id = $this->courseId;
        $lesson->name = $this->newLessonName;
        $lesson->description = $this->newLessonDescription;
        $lesson->save();

        $this->fetchData();

        // refresh wire:model data
        $this->newLessonName = "";
        $this->newLessonDescription = "";
    }
}

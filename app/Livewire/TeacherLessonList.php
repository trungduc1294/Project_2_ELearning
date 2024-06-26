<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class TeacherLessonList extends Component
{
    // add new lesson: wire:model data
    public $courseId;
    public $course;


    public $newLessonName;
    public $newLessonDescription;

    // Lesson list
    public $lessonList;

    // ==================== SYSTEM FUNCTION ====================
    public function render()
    {
        return view('livewire.teacher.teacher-lesson-list');
    }

    public function fetchData () {
        $this->lessonList = Lesson::where('course_id', $this->courseId)->get();
        $this->course = Course::find($this->courseId);
    }

    public function mount () {
        $this->fetchData();
    }

    // ==================== HELPER FUNCTION ====================\
    public function resetInputFields() {
        $this->newLessonName = "";
        $this->newLessonDescription = "";
    }

    // ==================== MAIN FUNCTION ====================
    public function addNewLesson() {

        if (empty($this->newLessonName)) {
            $this->dispatch('swal', title: 'Tên bài giảng không được để trống.', type: 'error');
            return;
        }

        $lesson = new Lesson;
        $lesson->course_id = $this->courseId;
        $lesson->name = $this->newLessonName;
        $lesson->description = $this->newLessonDescription;
        $lesson->save();

        // update course
        $course = Course::find($this->courseId);
        $course->number_of_lessons += 1;
        $course->save();

        $this->fetchData();

        $this->resetInputFields();
        $this->dispatch('swal', title: 'Thêm bài giảng thành công.', type: 'success');
    }

    public function deleteLesson($lessonId) {
        $lesson = Lesson::find($lessonId);
        $lesson->delete();

        // update course
        $course = Course::find($this->courseId);
        $course->number_of_lessons -= 1;
        $course->save();

        $this->fetchData();
        $this->dispatch('swal', title: 'Đã xoá bài giảng.', type: 'success');
    }
}

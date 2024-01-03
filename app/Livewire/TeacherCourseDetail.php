<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class TeacherCourseDetail extends Component
{
    public $courseId;
    public $course;
    public $step = "lesson-list";


    public function changeStep($step)
    {
        $this->step = $step;
    }

    public function fetchData() {
        $this->course = Course::find($this->courseId);
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.teacher-course-detail');
    }
}

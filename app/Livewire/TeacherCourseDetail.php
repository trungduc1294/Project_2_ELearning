<?php

namespace App\Livewire;

use Livewire\Component;

class TeacherCourseDetail extends Component
{
    public $step = "lesson-list";


    public function changeStep($step)
    {
        $this->step = $step;
    }

    public function render()
    {
        return view('livewire.teacher.teacher-course-detail');
    }
}

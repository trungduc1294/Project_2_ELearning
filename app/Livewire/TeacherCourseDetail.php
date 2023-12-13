<?php

namespace App\Livewire;

use Livewire\Component;

class TeacherCourseDetail extends Component
{
    public $course_id = 1;
    public function render()
    {
        return view('livewire.teacher.teacher-course-detail');
    }
}

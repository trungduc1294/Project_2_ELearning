<?php

namespace App\Livewire;

use Livewire\Component;

class StdCourseList extends Component
{
    // variable received from route
    public $course_id;

    
    public function render()
    {
        return view('livewire.student.course.std-course-list');
    }
}

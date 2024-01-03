<?php

namespace App\Livewire;

use Livewire\Component;

class CourseList extends Component
{
    public $course_name;
    public $course_description;
    public $teacher_id;

    public function render()
    {
        return view('livewire.teacher.course-manage.course-list');
    }

    public function addNewCourse() {
        $this->teacher_id = session('userId');
        dd($this->course_name, $this->course_description, $this->teacher_id);
    }
}

<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class CourseList extends Component
{
    public $course_name;
    public $course_description;
    public $teacher_id;

    public $listCourse;

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.course-manage.course-list');
    }

    public function fetchData() {
        $this->listCourse = Course::where('teacher_id', session('userId'))->get();
    }

    public function addNewCourse()
    {
        $course = new Course();
        $course->name = $this->course_name;
        $course->description = $this->course_description;
        $course->teacher_id = session("userId");
        $course->save();

        $this->fetchData();
    }
}

<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class CourseList extends Component
{
    // new course model variables
    public $course_name;
    public $course_description;
    public $course_category_id;


    // Course
    public $teacher_id;
    public $listCourse;

    // Category
    public $listCategory;

    public function fetchData() {
        $this->listCourse = Course::where('teacher_id', session('userId'))->get();
        $this->listCategory = Category::all();
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.course-manage.course-list');
    }

    public function addNewCourse()
    {
        $course = new Course();
        $course->name = $this->course_name;
        $course->description = $this->course_description;
        $course->category_id = $this->course_category_id;
        $course->teacher_id = session("userId");
        $course->save();

        $this->fetchData();
    }
}

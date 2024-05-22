<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class CourseList extends Component
{
    public $error = null;

    // new course model variables
    public $course_name;
    public $course_description;
    public $course_category_id;
    public $class;


    // Course
    public $teacher_id;
    public $listCourse;

    // Category
    public $listCategory;

    // ==================== SYSTEM FUNCTION ====================
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

    // ==================== HELPER FUNCTION ====================
    public function resetInputFields()
    {
        $this->course_name = '';
        $this->course_description = '';
        $this->course_category_id = '';
    }

    // ==================== MAIN FUNCTION ====================
    public function addNewCourse()
    {

        $course = new Course();
        $course->name = $this->course_name;
        $course->description = $this->course_description;
        $course->category_id = $this->course_category_id;
        $course->class = $this->class;
        $course->teacher_id = session("userId");
        $course->number_of_lessons = 0;
        $course->number_of_students = 0;
        $course->duration = 0;

        if ($course->category_id == 0) {
            // thong bao loi
            $this->error = "Please select a category";
            return;
        }

        if ($course->class == 0) {
            $this->error = "Please select a class";
            return;
        }

        $course->save();
        $this->resetInputFields();
        $this->error = null;

        $this->fetchData();
    }
}

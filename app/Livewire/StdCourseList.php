<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\User;
use Livewire\Component;

class StdCourseList extends Component
{
    // variable received from route
    public $user_id;
    public $user;

    // ===================== MODEL =====================
    public $categoryList;
    public $category_id = "all";
    public $courseList;


    // ===================== SUPORT FUNCTION =====================
    public function fetchData() {
        $this->user = User::find($this->user_id);
        $this->categoryList = Category::all();
        $this->filterCourse();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.student.course.std-course-list');
    }


    // ===================== MAIN FUNCTION =====================
    public function filterCourse() {
        $courseListId = CourseStudent::where('student_id', $this->user_id)->pluck('course_id');
        if ($this->category_id == "all") {
            $this->courseList = Course::whereIn('id', $courseListId)->get();
            return;
        }
        $this->courseList = Course::whereIn('id', $courseListId)->where('category_id', $this->category_id)->get();
    }
}

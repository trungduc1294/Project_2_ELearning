<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Lesson;
use App\Models\User;
use Livewire\Component;

class StdCourseDetail extends Component
{
    // variables recived from route
    public $student_id;
    public $course_id;
    public $teacher;
    public $category;
    public $student;
    public $course;
    public $lessonList;
    // check joined course
    public $isJoined;
    public $joinedCourseListId;
    

    // ============================= SYSTEM FUNCTION =============================
    public function fetchData() {
        $this->student = User::find($this->student_id);
        $this->course = Course::find($this->course_id);
        $this->teacher = User::find($this->course->teacher_id);
        $this->category = Category::find($this->course->category_id);
        $this->lessonList = Lesson::where('course_id', $this->course_id)->get();

        // check if student joined course
        $this->joinedCourseListId = CourseStudent::where('student_id', $this->student_id)->pluck('course_id')->toArray();
        $this->checkCourseJoined();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.student.course.std-course-detail');
    }

    // ============================= CUSTOM FUNCTION =============================

    public function checkCourseJoined() {
        if (in_array($this->course_id, $this->joinedCourseListId)) {
            $this->isJoined = true;
            return;
        }
        $this->isJoined = false;
    }
}

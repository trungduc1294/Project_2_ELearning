<?php

namespace App\Livewire;

use App\Helpers\UserHelper;
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
    public $isRequesting;
    public $joinedCourseListId; // list of course id that student joined

    // tab
    public $tab = 'lessonsList';
    

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

    // ============================= HELPER FUNCTION =============================
    public function changeTab($tab) {
        $this->tab = $tab;
    }

    // ============================= MAIN FUNCTION =============================

    public function checkCourseJoined() {
        if (in_array($this->course_id, $this->joinedCourseListId)) {
            $joinStatus = CourseStudent::where('student_id', $this->student_id)->where('course_id', $this->course_id)->first()->status;
            if ($joinStatus == "joined") {
                $this->isJoined = true;
            } elseif ($joinStatus == "requesting") {
                $this->isRequesting = true;
            }
            return;
        }
        $this->isJoined = false;
        $this->isRequesting = false;
    }

    public function requestJoinCourse() {
        $course_student = new CourseStudent();
        $course_student->course_id = $this->course_id;
        $course_student->student_id = $this->student_id;
        $course_student->status = "requesting";
        $course_student->save();

        // add point to student
        UserHelper::addPoint($this->student, 50);

        $this->fetchData();
        $this->dispatch('swal', title: 'Đã yêu cầu tham gia khoá học.', type: 'success');
    }
    
}

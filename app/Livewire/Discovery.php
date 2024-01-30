<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseStudent;
use Livewire\Component;

class Discovery extends Component
{
    public $user_id;
    public $categoryList;
    public $page = "topic";
    public $topic = 1;

    // joinwithcode
    public $code;

    // ============================= SUPPORT FUNCTION =============================
    public function changePage($page)
    {
        $this->page = $page;
    }

    public function changeTopic($topic)
    {
        $this->topic = $topic;
        $this->getCourseByTopic($this->topic);
    }

    // Get course list function to render
    public $newestCourseList;
    public function getNewestCourseList() {
        $this->newestCourseList = Course::orderBy('created_at', 'desc')->get();
    }

    public $courseListTopic;
    public function getCourseByTopic($category_id) {
        $this->courseListTopic = Course::where('category_id', $category_id)->get();
    }

    // ============================= SYSTEM FUNCTION =============================
    public function fetchData() {
        $this->categoryList = Category::all();
        $this->getNewestCourseList();
        $this->getCourseByTopic($this->topic);
        $this->user_id = session('userId');

        $this->topic = $this->categoryList[0]['name'];
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.student.discovery.discovery');
    }

    // ============================= CUSTOM FUNCTION =============================
    public function joinWithCode() {
        $course = Course::where('reference_code', $this->code)->first();
        if ($course) {
            $courseStudent = new CourseStudent();
            $courseStudent->course_id = $course->id;
            $courseStudent->student_id = $this->user_id;
            $courseStudent->status = "requesting";
            $courseStudent->save();

            $course->number_of_student += 1;
            $course->save();
        } else {
            session()->flash('error', 'Mã khóa học không tồn tại');
        }
    }
}

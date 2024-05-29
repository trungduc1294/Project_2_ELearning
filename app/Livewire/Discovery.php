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
    public $currentClassIndex = 0;

    public $coursesByClass = [];

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

    public function changeClassIndex($index){
        $this->currentClassIndex = $index;
        $this->getCourseByClass($this->currentClassIndex);
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

    public function getCourseByClass($currentClassIndex) {
        // $currentClassIndex = 0 => Lop 10
        // $currentClassIndex = 1 => Lop 11
        // $currentClassIndex = 2 => Lop 12
        // $currentClassIndex = 3 => Khac (orther)
        if ($currentClassIndex == 0) 
            $this->coursesByClass = Course::where('class', '10')->get();
        if ($currentClassIndex == 1)
            $this->coursesByClass = Course::where('class','11')->get();
        if ($currentClassIndex == 2)
            $this->coursesByClass = Course::where('class','12')->get();
        if ($currentClassIndex == 3)
            $this->coursesByClass = Course::where('class','orther')->get();
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
        // get all course_student
        $courseStudents = CourseStudent::all();

        $course = Course::where('reference_code', $this->code)->first();

        if ($course) {
            foreach ($courseStudents as $item) {
                if ($item->student_id == $this->user_id && $item->course_id == $course->id) {
                    session()->flash('error', 'Bạn đã đăng ký tham gia khóa học này rồi');
                    // return redirect()->route('student.course.detail', [
                    //     'student_id' => $this->user_id,
                    //     'course_id' => $course->id
                    // ]);
                    return;
                }
            }
            $courseStudent = new CourseStudent();
            $courseStudent->course_id = $course->id;
            $courseStudent->student_id = $this->user_id;
            $courseStudent->status = "requesting";
            $courseStudent->save();

            $course->number_of_students += 1;
            $course->save();

            // redirect to course detail
            return redirect()->route('student.course.detail', [
                'student_id' => $this->user_id,
                'course_id' => $course->id
            ]);
        } else {
            session()->flash('error', 'Mã khóa học không tồn tại');
            $this->dispatch('swal', title: 'Không có khoá học với mã này.', type: 'error');

        }
    }
}

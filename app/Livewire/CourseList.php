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
        if (empty($this->course_name)) {
            $this->dispatch('swal', title: 'Hãy nhập tên khoá học.', type: 'error');
            return;
        }
        if (empty($this->course_description)) {
            $this->dispatch('swal', title: 'Hãy nhập mô tả khoá học.', type: 'error');
            return;
        }

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
            $this->dispatch('swal', title: 'Thiếu phân loại khoá học', type: 'success');
            return;
        }

        if ($course->class == 0) {
            $this->dispatch('swal', title: 'Thiếu phân loại lớp', type: 'success');
            return;
        }

        $course->save();
        $this->resetInputFields();
        $this->error = null;

        $this->fetchData();
        $this->dispatch('swal', title: 'Đã thêm khoá học mới của bạn.', type: 'success');

    }
}

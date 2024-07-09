<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Livewire\Component;

use function Laravel\Prompts\alert;

class TeacherCourseDetail extends Component
{
    public $courseId;
    public $course;
    public $course_category_name;
    public $step = "lesson-list";
    public $teacher;

    // livewire model binding
    public $updateCourseName;
    public $updateCourseDescription;

    // ==================== SYSTEM FUNCTION ====================
    public function changeStep($step)
    {
        $this->step = $step;
    }

    public function fetchData() {
        $this->course = Course::find($this->courseId);
        $this->course_category_name = Category::find($this->course->category_id)->name;
        $this->teacher = User::find($this->course->teacher_id);
        $this->updateCourseName = $this->course->name;
        $this->updateCourseDescription = $this->course->description;
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.course-manage.teacher-course-detail');
    }

    // ==================== HELPER FUNCTION ====================

    // ==================== MAIN FUNCTION ====================
    // update course in course info modal
    public function updateCourseInfo() {
        $updateCourse = Course::find($this->courseId);
        $updateCourse->name = $this->updateCourseName;
        $updateCourse->description = $this->updateCourseDescription;
        $updateCourse->save();

        $this->fetchData();
        $this->dispatch('swal', title: 'Cập nhật thông tin khoá học thành công.', type: 'success');
    }

    // delete course
    public function deleteCourse() {
        $deleteCourse = Course::find($this->courseId);
        $deleteCourse->delete();

        return redirect()->route('teacher.course');
    }

    // generate code with number and letter
    public function generateRandomCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomCode = '';
        for ($i = 0; $i < 6; $i++) {
            $randomCode .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomCode;
        
    }

    // Ham tao ma khoa hoc
    public function generateCourseCode() {
        $randomCode = $this->generateRandomCode();
        $checkCode = Course::where('reference_code', $randomCode)->first();
        if($checkCode) {
            $this->generateCourseCode();
        } else {
            $this->course->reference_code = $randomCode;
            $this->course->save();

            $this->fetchData();
            $this->dispatch('swal', title: 'Tạo mã tham gia khoá học thành công.', type: 'success');
        }
    }

    public function redirectToMeetingRoom() {
        // if($this->course->reference_code == null) {
        //     $this->dispatch('swal', title: 'Vui lòng tạo mã tham gia khoá học trước khi tạo phòng học.', type: 'error');
        //     return;
        // }
        return redirect()->route('meeting', [
            'course_id' => $this->courseId
        ]);
    }
}

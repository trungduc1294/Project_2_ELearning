<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

use function Laravel\Prompts\alert;

class TeacherCourseDetail extends Component
{
    public $courseId;
    public $course;
    public $step = "lesson-list";

    // livewire model binding
    public $updateCourseName;
    public $updateCourseDescription;


    public function changeStep($step)
    {
        $this->step = $step;
    }

    public function fetchData() {
        $this->course = Course::find($this->courseId);
        $this->updateCourseName = $this->course->name;
        $this->updateCourseDescription = $this->course->description;
    }

    public function mount()
    {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.teacher.teacher-course-detail');
    }

    // fuctions ========================================

    // update course in course info modal
    public function updateCourseInfo() {
        $updateCourse = Course::find($this->courseId);
        $updateCourse->name = $this->updateCourseName;
        $updateCourse->description = $this->updateCourseDescription;
        $updateCourse->save();

        $this->fetchData();
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
        }
    }
}

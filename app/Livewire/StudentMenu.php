<?php

namespace App\Livewire;

use App\Models\CourseStudent;
use Livewire\Component;
use App\Models\User;

class StudentMenu extends Component
{

    public $student;
    public $student_id;
    public $countCourseStudent;

    public function fetchData() {
        $this->student_id = session('userId');
        $this->student = User::find($this->student_id);
        $this->countCourseStudent = $this->countCourse();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.both.landing-page.student-menu');
    }

    // ===================== CUSTOM FUNCTION =====================
    public function countCourse() {
        return CourseStudent::where('student_id', $this->student_id)->where('status', 'joined')->count();
    }
}

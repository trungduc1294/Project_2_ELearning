<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use App\Models\User;

class TeacherMenu extends Component
{

    public $teacher_id;
    public $teacher;
    public $teacherCourse;
    public $lessons = [];
    public $totalStudents;

    public function fetchData() {
        $this->teacher_id = session('userId');
        $this->teacher = User::find($this->teacher_id);
        $this->teacherCourse = $this->getCourses();
        $this->lessons = $this->getLessons();
        $this->totalStudents = $this->countStudents();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.both.landing-page.teacher-menu');
    }

    // ===================== CUSTOM FUNCTION =====================
    public function getCourses() {
        return Course::where('teacher_id', $this->teacher_id)->get();
    }

    public function getLessons() {
        $allLessons = [];
        foreach ($this->teacherCourse as $course) {
            $lessons = Lesson::where('course_id', $course->id)->get();
            foreach ($lessons as $item) {
                array_push($allLessons, $item);
            }
        }
        return $allLessons;
    }

    public function countStudents() {
        $total = 0;
        foreach ($this->teacherCourse as $course) {
            $total += Course::where('id', $course->id)->get()->first()->number_of_students;
        }
        return $total;
    }
}

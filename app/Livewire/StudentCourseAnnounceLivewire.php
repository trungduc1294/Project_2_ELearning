<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class StudentCourseAnnounceLivewire extends Component
{
    public $course; // recieve course from parent component
    public $announcement;

    public function fetchData() {
        $this->announcement = $this->getCourseAnnouncement($this->course->id);
    }
    public function mount() {
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.student.course.student-course-announce-livewire');
    }

    public function getCourseAnnouncement($id) {
        $course = Course::find($id);
        return $course->announcement;
    }
}

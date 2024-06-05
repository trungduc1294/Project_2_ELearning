<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class TeacherCourseAnnounceLivewire extends Component
{
    public $course_id;
    public $announcement;

    public function fetchData() {
        $this->announcement = $this->getCourseAnnouncement($this->course_id);
    }
    public function mount() {
        $this->fetchData();
    }
    public function render()
    {
        return view('livewire.teacher.course-manage.teacher-course-announce-livewire');
    }

    // Add more functions here
    public function updateCourseAnnouncement() {
        $course = Course::find($this->course_id);
        $course->announcement = $this->announcement;
        $course->save();
        $this->fetchData();
        
        $this->dispatch('swal', title: 'Cập nhật thông báo cho khoác học thành công.', type: 'success');
    }

    public function getCourseAnnouncement($id) {
        $course = Course::find($id);
        return $course->announcement;
    }
}

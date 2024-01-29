<?php

namespace App\Livewire;

use Livewire\Component;

class TeacherCreateMeetingLivewire extends Component
{
    public $course_id;
    public function render()
    {
        return view('livewire.teacher.meeting.teacher-create-meeting-livewire');
    }
}

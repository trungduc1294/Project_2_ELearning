<?php

namespace App\Livewire;

use Livewire\Component;

class TeacherJoinRoomLivewire extends Component
{
    public $course_id;
    public function render()
    {
        return view('livewire.teacher.meeting.teacher-join-room-livewire');
    }
}

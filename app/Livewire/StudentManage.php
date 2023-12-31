<?php

namespace App\Livewire;

use Livewire\Component;

class StudentManage extends Component
{
    public $title;
    public function render()
    {
        return view('livewire.teacher.student-manage.student-manage');
    }
}

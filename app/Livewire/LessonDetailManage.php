<?php

namespace App\Livewire;

use Livewire\Component;

class LessonDetailManage extends Component
{
    public $title;
    public function render()
    {
        return view('livewire.teacher.lesson-detail-manage.lesson-detail-manage');
    }
}

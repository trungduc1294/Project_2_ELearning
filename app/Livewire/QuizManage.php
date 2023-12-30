<?php

namespace App\Livewire;

use Livewire\Component;

class QuizManage extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.teacher.quiz-manage.quiz-manage');
    }
}

<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class HeadmasterMenu extends Component
{
    public $totalCourse;
    public $totalTeacher;
    public $totalStudent;

    public function fetchData() {
        $this->totalCourse = $this->getTotalCourse();
        $this->totalTeacher = $this->getTotalTeacher();
        $this->totalStudent = $this->getTotalStudent();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.both.landing-page.headmaster-menu');
    }

    // ==================== CUSTOM FUNC ====================
    public function getTotalCourse() {
        return Course::all()->count();
    }

    public function getTotalTeacher() {
        return User::where('role', 'teacher')->count();
    }

    public function getTotalStudent() {
        return User::where('role', 'student')->count();
    }
}

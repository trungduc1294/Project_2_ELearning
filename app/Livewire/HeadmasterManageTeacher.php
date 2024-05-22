<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class HeadmasterManageTeacher extends Component
{
    public $currentNavIndex = 0;
    public $users = [];
    public $teachers = [];
    public $searchText;

    public function changeNavIndex($navIndex) {
        $this->currentNavIndex = $navIndex;
    }

    public function fetchData() {
        $this->users = $this->getUser();
        $this->teachers = $this->getTeacher();
    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.headmaster.headmaster-manage-teacher');
    }

    // ======================== CUSTOM FUNC ========================
    public function getUser() {
        return User::where('role', 'student')->get();
    }

    public function getTeacher() {
        return User::where('role', 'teacher')->get();
    }

    public function search() {
        
        if ($this->currentNavIndex == 0) {
            $this->users = User::where('role', 'student')
            ->where(function($query) {
                $query->where('username', 'like','%'. $this->searchText .'%')
                ->orWhere('email','like','%'. $this->searchText .'%');
            })->get();
        }
        if ($this->currentNavIndex == 1) {
            $this->teachers = User::where('role', 'teacher')
            ->where(function($query) {
                $query->where('username', 'like','%'. $this->searchText .'%')
                ->orWhere('email','like','%'. $this->searchText .'%');
            })->get();
        }
    }

    public function changeRole($id) {
        $user = User::find($id);
        if ($user->role == 'student') {
            $user->role = 'teacher';
        } else {
            $user->role = 'student';
        }
        $user->save();

        $this->fetchData();
    }
}

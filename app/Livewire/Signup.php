<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Signup extends Component
{

    public $username;
    public $email;
    public $password;
    public $role;

    public function render()
    {
        return view('livewire.signup');
    }

    public function submit() {
        $this->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->role = "student";
        $user->rank_point = 0;
        $user->save();

        redirect('/login');
    }
}

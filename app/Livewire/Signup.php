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
        $user->role = $this->role;
        $user->save();

        redirect('/login');
    }
}

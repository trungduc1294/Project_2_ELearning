<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Signup extends Component
{

    public $username;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.signup');
    }

    public function submit() {
        $this->validate([
            'username' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->save();

        redirect('/login');
    }
}

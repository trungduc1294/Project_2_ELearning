<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    
    public function render()
    {
        return view('livewire.login');
    }

    public function submit () {
        $this->validate(
            [
                'email'=> 'required|email',
                'password'=> 'required',
            ]
        );

        // find user in database
        $user = User::where('email', $this->email)->first();
        if ($user && $user->password == $this->password) {
            redirect('/course-detail');
        } else {
            dd('user not found');
        }
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class Signup extends Component
{

    public $email;

    public function showEmail() {
        dd($this->email);
    }

    public function render()
    {
        return view('livewire.signup');
    }
}

<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class LwAccount extends Component
{
    public $step = "account";

    // user id received from route 
    public $user_id;
    public $user;

    // wire model for input
    public $username;
    public $email;
    public $password;
    public $name;
    public $phone;
    public $address;
    public $class;


    // system function
    public function fetchData() {
        $this->user = User::find($this->user_id);
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->name = $this->user->name;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
        $this->class = $this->user->class;
    }

    public function mount() {
        $this->fetchData();
    }

    public function changeStep($step) {
        $this->step = $step;
    }

    public function render()
    {
        return view('livewire.both.lw-account');
    }

    // program function
    public function updateAccount() {
        $this->validate([
            'username' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $this->user->username = $this->username;
        $this->user->email = $this->email;
        $this->user->password = $this->password;
        $this->user->save();

        $this->fetchData();
    }

    public function updateProfile() {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'class' => 'required'
        ]);

        $this->user->name = $this->name;
        $this->user->phone = $this->phone;
        $this->user->address = $this->address;
        $this->user->class = $this->class;
        $this->user->save();

        $this->fetchData();
    }
}

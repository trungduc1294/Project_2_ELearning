<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{

    public $email;
    public $password;

    // fogot password
    public $verify_email;
    public $input_verify_code;
    public $verify_code;
    
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
        if ($user && Hash::check($this->password, $user->password)) {
            session()->put('userId', $user->id);
            session()->put('username', $user->username);
            session()->put('role', $user->role);

            redirect('/');
        } else {
            session()->flash('error', 'Email or password is wrong.');
        }
    }

    // function gen string random code
    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength -1)];
        }
        
        return $randomString;
    }

    public function sendVerifyCodeEmail () {
        $user_email = $this->verify_email;
        
        // check email in database
        $user = User::where('email', $user_email)->first();
        if (!$user) {
            session()->flash('error', 'Email not found.');
        }

        // generate verify code
        $this->verify_code = $this->generateRandomString(6);
        Mail::send('mails.verify_code', [
            'verify_code' => $this->verify_code,
        ], function ($email) use ($user_email) {
            $email->to($user_email)->subject('Verify code for new password.');
        });
    }
    public function createNewPassword () {
        if ($this->input_verify_code != $this->verify_code) {
            dd('wrong verify code');
        }

        $newPassword = $this->generateRandomString(6);
        $user = User::where('email', $this->verify_email)->first();
        $user->password = $newPassword;
        $user->save();

        $user_email = $this->verify_email;
        Mail::send('mails.new_password', [
            'new_password' => $newPassword,
        ], function ($email) use ($user_email) {
            $email->to($user_email)->subject('New password.');
        });
    }
}

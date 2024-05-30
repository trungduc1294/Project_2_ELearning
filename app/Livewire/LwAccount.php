<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

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

    // ranking
    public $rank_point;
    public $progress_bar_percent;
    public $user_rank; //from 1 to 15

    // leader board
    public $top3User;



    // ==================== SYSTEM FUNCTION ====================
    public function fetchData() {
        $this->user = User::find($this->user_id);
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->name = $this->user->name;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
        $this->class = $this->user->class;

        // ranking
        $this->rank_point = $this->user->rank_point;
        $this->progress_bar_percent = $this->countPercent($this->rank_point);
        $this->user_rank = $this->getRank($this->rank_point);

        // leader board
        $this->top3User = $this->getTop3User();
        // dd($this->top3User[0]->rank_point);
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

    // ==================== Chung ====================
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
        $this->dispatch('swal', title: 'Cập nhật thông tin tài khoản thành công.', type: 'success');
    }

    // ==================== Profile ====================
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

        Alert::success('Success', 'Profile updated successfully!');

        $this->fetchData();
        $this->dispatch('swal', title: 'Cập nhật thông tin cá nhân thành công.', type: 'success');
    }

    // ==================== Rank ====================
    public function countPercent($point) {
        return ($point % 1000) / 1000 * 100;
    }

    public function getRank($point) {
        if ($point < 1000) {
            return 1;
        } else if ($point < 2000) {
            return 2;
        } else if ($point < 3000) {
            return 3;
        } else if ($point < 4000) {
            return 4;
        } else if ($point < 5000) {
            return 5;
        } else if ($point < 6000) {
            return 6;
        } else if ($point < 7000) {
            return 7;
        } else if ($point < 8000) {
            return 8;
        } else if ($point < 9000) {
            return 9;
        } else if ($point < 10000) {
            return 10;
        } else if ($point < 11000) {
            return 11;
        } else if ($point < 12000) {
            return 12;
        } else if ($point < 13000) {
            return 13;
        } else if ($point < 14000) {
            return 14;
        } else {
            return 15;
        }
    }

    // ======================= Leaderboard =======================
    public function getTop3User() {
        $topUser = User::orderBy('rank_point', 'desc')->take(3)->get();
        return $topUser;
    }
}

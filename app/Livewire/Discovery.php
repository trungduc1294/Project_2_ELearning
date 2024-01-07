<?php

namespace App\Livewire;

use Livewire\Component;

class Discovery extends Component
{
    public $page = "topic";
    public $topic = "math";

    public function changePage($page)
    {
        $this->page = $page;
    }

    public function changeTopic($topic)
    {
        $this->topic = $topic;
    }

    // system fucntion
    public function fetchData() {

    }

    public function mount() {
        $this->fetchData();
    }

    public function render()
    {
        return view('livewire.student.discovery.discovery');
    }
}

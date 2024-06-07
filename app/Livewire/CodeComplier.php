<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CodeComplier extends Component
{
    public $code;
    public $language;
    public $stdin;

    public $output;
    public $statusCode;
    public $memory;
    public $cpuTime;

    // protected $listeners = ['store'];

    // public function store($content) {
    //     $this->code = $content;
    //     dd($this->code);
    // }

    // public function changeLanguage() {
    //     dd($this->language);
    // }

    public function runCode($content) {
        // dd("run code");

        // if($this->language == '0') {
        //     $this->output = 'Please select a language';
        //     return;
        // }

        // dd($this->stdin, $content);

        $response = Http::post('https://api.jdoodle.com/v1/execute', [
            'clientId' => env('JD_CLIENT_ID'),
            'clientSecret' => env('JD_CLIENT_SECRET'),
            // 'script' => $this->code,
            'script' => $content,
            'language' => $this->language,
            'stdin' => $this->stdin,
            // 'stdin' => 2,
            // 'language' => 'python3',
            'versionIndex' => '3'
        ]);

        // decode the json response and store the output
        $responseData = json_decode($response->body());

        if($responseData->statusCode == 200) {
            $this->output = $responseData->output;
            // dd($this->output);
            // $this->statusCode = $responseData->statusCode;
            // $this->memory = $responseData->memory;
            // $this->cpuTime = $responseData->cpuTime;
        } else {
            $this->output = $responseData->error;
            $this->dispatch('swal', title: 'Chưa chọn ngôn ngữ biên dịch.', type: 'error');
        }
    }

    public function render()
    {
        return view('livewire.both.code-complier');
    }
}

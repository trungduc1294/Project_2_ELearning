<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CodeComplier extends Component
{
    public $code;

    public $output;
    public $statusCode;
    public $memory;
    public $cpuTime;

    public function runCode() {
        $response = Http::post('https://api.jdoodle.com/v1/execute', [
            'clientId' => env('JD_CLIENT_ID'),
            'clientSecret' => env('JD_CLIENT_SECRET'),
            'script' => $this->code,
            'language' => 'python3',
            'versionIndex' => '3'
        ]);
        
        // decode the json response and store the output
        $responseData = json_decode($response->body());

        if($responseData->statusCode == 200) {
            $this->output = $responseData->output;
            $this->statusCode = $responseData->statusCode;
            $this->memory = $responseData->memory;
            $this->cpuTime = $responseData->cpuTime;
        } else {
            $this->output = $responseData->error;
        }
    }

    public function render()
    {
        return view('livewire.both.code-complier');
    }
}

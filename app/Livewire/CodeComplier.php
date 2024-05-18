<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CodeComplier extends Component
{
    public $code;
    public $output;

    public function runCode() {
        $response = Http::post('https://api.jdoodle.com/v1/execute', [
            'clientId' => env('JD_CLIENT_ID'),
            'clientSecret' => env('JD_CLIENT_SECRET'),
            'script' => $this->code,
            'language' => 'python3',
            'versionIndex' => '3'
        ]);
        dd($response->json());
    }

    public function render()
    {
        return view('livewire.both.code-complier');
    }
}

<?php

namespace App\Livewire;

use App\Models\Documents;
use Livewire\Component;

class DocumentList extends Component
{

    public $course_id;
    public $lesson_id;

    public function render()
    {
        return view('livewire.both.document.document-list', [
            'documents' => Documents::all(),
        ]);
    }
}

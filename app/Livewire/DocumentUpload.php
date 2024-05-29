<?php

namespace App\Livewire;

use App\Models\Documents;
use Livewire\Component;
use Livewire\WithFileUploads;


class DocumentUpload extends Component
{
    use WithFileUploads;
    public $course_id;
    public $lesson_id;

    public $title;
    public $file;

    protected $rules = [
        'title' => 'required|string|max:255',
        'file' => 'required|file|mimes:pdf,doc,docx,xlsx'
    ];

    public function save()
    {
        $this->validate();

        $filePath = $this->file->store('documents', 'public');

        Documents::create([
            'title' => $this->title,
            'file_path' => $filePath,
            'course_id' => $this->course_id,
            'lesson_id'=> $this->lesson_id
        ]);

        session()->flash('message', 'Tài liệu đã được tải lên thành công.');
    }

    public function render()
    {
        return view('livewire.both.document.document-upload');
    }
}

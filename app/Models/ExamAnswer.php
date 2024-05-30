<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        "exam_id",
        "question_id",
        "student_id",
        "answer_text",
    ];

    public function question() {
        return $this->belongsTo(ExamQuestion::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamOption extends Model
{
    use HasFactory;

    protected $fillable = [
        "question_id", // "question_id" is the foreign key that references the "id" column on the "exam_questions" table
        "option_text",
        "is_correct",
    ];

    public function question() {
        return $this->belongsTo(ExamQuestion::class);
    }
}

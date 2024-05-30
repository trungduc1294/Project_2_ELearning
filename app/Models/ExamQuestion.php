<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        "exam_id", // "exam_id" is the foreign key that references the "id" column on the "exams" table
        "question_text",
        "question_type",
    ];

    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function question() {
        return $this->hasMany(ExamOption::class);
    }

    public function answers() {
        return $this->hasMany(ExamAnswer::class);
    }
}

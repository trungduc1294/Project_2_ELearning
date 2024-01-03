<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer_id',
        'lesson_id',
        'course_id',
        'created_at',
        'updated_at'
    ];

    public function answer() {
        return $this->hasMany(QuizAnswer::class);
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}

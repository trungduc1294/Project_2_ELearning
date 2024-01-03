<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'answer_content',
        'is_correct',
        'created_at',
        'updated_at'
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}

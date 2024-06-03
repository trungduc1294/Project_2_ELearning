<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    use HasFactory;

    protected $table = 'exam_scores';

    protected $fillable = [
        'student_id',
        'exam_id',
        'temp_score',
        'score',
    ];

    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
}

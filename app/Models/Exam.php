<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "start_time",
        "end_time",
        "create_by",
        "course_id",
    ];

    public function question() {
        return $this->hasMany(ExamQuestion::class);
    }
}

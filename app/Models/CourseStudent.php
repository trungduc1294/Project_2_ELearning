<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'course_id',
        'student_id',
        'created_at',
        'updated_at'
    ];

    public function course () {
        return $this->belongsTo(Course::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}

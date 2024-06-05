<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";
    
    protected $fillable = [
        'name',
        'description',
        'announcement',
        'category_id',
        'class',
        'number_of_lessons',
        'number_of_students',
        'duration',
        'teacher_id',
        'reference_code',
        'meeting_code',
        "created_at",
        "updated_at",
    ];

}

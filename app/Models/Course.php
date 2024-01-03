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
        'number_of_lessions',
        'number_of_students',
        'duration',
        'teacher_id',
        'reference_code',
        "created_at",
        "updated_at",
    ];

    public function lesson() {
        return $this->hasMany(Lesson::class);
    }
}

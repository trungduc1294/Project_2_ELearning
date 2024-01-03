<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "video_url",
        "course_id",
        "duration",
        "created_at",
        "updated_at",
    ];
}

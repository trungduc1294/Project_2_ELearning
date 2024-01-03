<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [ // fillable fields
        'user_id',
        'user_name',
        'lesson_id',
        'comment_content',
        'created_at',
        'updated_at'
    ];
}

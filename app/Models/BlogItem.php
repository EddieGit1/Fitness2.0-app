<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'workout_title',
        'blog_title',
        'blog_text'
    ];
}

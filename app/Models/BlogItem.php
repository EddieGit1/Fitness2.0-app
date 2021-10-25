<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'blog_title',
        'blog_text'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}



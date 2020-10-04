<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = [
        'blog_id', 'user_id', 'comment',
        'created_at', 'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogUpvote extends Model
{
    protected $fillable = [
        'blog_id', 'user_id',
        'created_at', 'updated_at'
    ];
}

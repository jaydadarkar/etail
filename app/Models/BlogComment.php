<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use App\User;

class BlogComment extends Model
{
    protected $fillable = [
        'blog_id', 'user_id', 'comment',
        'created_at', 'updated_at'
    ];

    public function blog()
    {
        return $this->hasOne(\App\Models\Blog::class, 'id', 'blog_id');
    }

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}

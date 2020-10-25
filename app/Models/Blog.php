<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\BlogCategory;
use App\Models\BlogUpvote;

class Blog extends Model
{
    protected $fillable = [
        'author_id', 'post_status', 'post_title', 'post_category', 'post_slug',
        'post_image', 'post_content', 'post_tags',
        'post_featured_image', 'post_meta_keywords',
        'post_meta_desc',
        'created_at', 'updated_at'
    ];

    public function author()
    {
        return $this->hasOne(\App\User::class, 'id', 'author_id');
    }

    public function category()
    {
        return $this->hasOne(\App\Models\BlogCategory::class, 'id', 'post_category');
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\BlogComment::class, 'blog_id', 'id');
    }

    public function upvotes()
    {
        return $this->hasMany(\App\Models\BlogUpvote::class, 'blog_id', 'id')->count();
    }
}

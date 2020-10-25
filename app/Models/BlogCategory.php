<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class BlogCategory extends Model
{
    protected $fillable = [
        'blog_category_name', 'blog_category_slug', 'blog_category_desc',
        'blog_meta_keywords', 'blog_meta_desc', 'blog_featured_image',
        'blog_category_parent',
        'created_at', 'updated_at'
    ];

    public function parent()
    {
        return $this->hasOne(\App\Models\BlogCategory::class, 'id', 'blog_category_parent');
    }

    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class, 'post_category', 'id');
    }
}

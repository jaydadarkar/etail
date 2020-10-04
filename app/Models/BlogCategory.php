<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'blog_category_name', 'blog_category_slug', 'blog_category_desc',
        'blog_meta_keywords', 'blog_meta_desc', 'blog_featured_image',
        'blog_category_parent',
        'created_at', 'updated_at'
    ];
}

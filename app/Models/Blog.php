<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'post_title', 'post_category', 'post_slug',
        'post_image', 'post_content', 'post_tags',
        'post_featured_image', 'post_meta_keywords',
        'post_meta_desc',
        'created_at', 'updated_at'
    ];
}

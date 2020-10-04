<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_title', 'page_slug', 'page_content',
        'page_meta_keywords', 'page_meta_desc',
        'created_at', 'updated_at'
    ];
}

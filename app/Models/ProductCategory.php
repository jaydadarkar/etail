<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'product_category_name', 'product_category_slug',
        'product_category_desc', 'product_cat_meta_keywords',
        'product_cat_meta_desc', 'product_cat_featured_image',
        'product_cat_parent_id',
        'created_at', 'updated_at'
    ];
}

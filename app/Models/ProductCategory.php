<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductCategory extends Model
{
    protected $fillable = [
        'product_category_name', 'product_category_slug',
        'product_category_desc', 'product_cat_meta_keywords',
        'product_cat_meta_desc', 'product_cat_featured_image',
        'product_cat_parent_id',
        'created_at', 'updated_at'
    ];

    public function parent()
    {
        return $this->hasMany(\App\Models\ProductCategory::class, 'id', 'product_cat_parent_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'product_category', 'id');
    }
}

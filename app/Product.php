<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_sku',
        'product_slug',
        'product_category',
        'product_variation',
        'product_short_desc',
        'product_long_desc',
        'product_mrp',
        'product_price',
        'product_primary_image',
        'product_other_images',
        'product_meta_keywords',
        'product_meta_desc',
        'product_featured',
        'product_tags',
        'created_at',
        'updated_at'
    ];
}

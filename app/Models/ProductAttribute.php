<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'attribute_name', 'attribute_slug',
        'created_at', 'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(\App\Model\Product::class, 'product_variation', 'id');
    }
}

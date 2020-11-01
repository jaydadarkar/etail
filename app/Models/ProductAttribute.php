<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductAttributeValue;

class ProductAttribute extends Model
{
    protected $fillable = [
        'attribute_name', 'attribute_slug',
        'created_at', 'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'product_variation', 'id');
    }

    public function attributeValues()
    {
        return $this->hasOne(\App\Models\ProductAttributeValue::class, 'attribute_id', 'id');
    }
}

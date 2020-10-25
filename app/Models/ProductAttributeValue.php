<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttribute;

class ProductAttributeValue extends Model
{
    protected $fillable = [
        'attribute_id', 'attribute_values',
        'created_at', 'updated_at'
    ];

    public function attribute()
    {
        return $this->hasOne(\App\Models\ProductAttribute::class, 'id', 'attribute_id');
    }
}

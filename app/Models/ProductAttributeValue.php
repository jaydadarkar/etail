<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = [
        'attribute_id', 'attribute_values',
        'created_at', 'updated_at'
    ];
}

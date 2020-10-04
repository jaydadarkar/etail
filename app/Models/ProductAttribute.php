<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'attribute_name', 'attribute_slug',
        'created_at', 'updated_at'
    ];
}

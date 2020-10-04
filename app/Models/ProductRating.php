<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $fillable = [
        'product_id', 'product_main_sku', 'user_id',
        'user_rating', 'user_comment', 'is_verified_purchase',
        'is_confirmed',
        'created_at', 'updated_at'
    ];
}

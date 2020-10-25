<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\User;

class ProductRating extends Model
{
    protected $fillable = [
        'product_id', 'product_main_sku', 'user_id',
        'user_rating', 'user_comment', 'is_verified_purchase',
        'is_confirmed',
        'created_at', 'updated_at'
    ];

    public function product()
    {
        return $this->hasOne(\App\Models\Product::class, 'id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}

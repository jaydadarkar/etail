<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
use App\Model\Product;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_name', 'coupon_code', 'type', 'product_id',
        'percent_off', 'value_off',
        'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->hasMany(\App\Model\Order::class, 'coupon_code', 'coupon_code');
    }

    public function product()
    {
        return $this->hasOne(\App\Model\Product::class, 'id', 'product_id');
    }
}

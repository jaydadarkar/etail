<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_name', 'coupon_code', 'type', 'product_id',
        'percent_off', 'value_off',
        'created_at', 'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoice_id', 'user_id', 'address_line_id',
        'product_line_id', 'order_status', 'order_sub_total',
        'order_total', 'payment_method', 'payment_status',
        'coupon_code', 'affiliate_code',
        'created_at', 'updated_at'
    ];
}

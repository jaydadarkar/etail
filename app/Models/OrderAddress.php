<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = [
        'order_id', 'user_billing_name', 'user_billing_address_line_1',
        'user_billing_address_line_2', 'user_billing_city', 'user_billing_state',
        'user_billing_country', 'user_billing_postal', 'user_billing_phone',
        'user_shipping_name', 'user_shipping_address_line_1', 'user_shipping_address_line_2',
        'user_shipping_city', 'user_shipping_state', 'user_shipping_country',
        'user_shipping_postal', 'user_shipping_phone',
        'created_at', 'updated_at'
    ];
}

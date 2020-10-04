<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_quantity', 'product_total',
        'status', 'tracking_company', 'tracking_id',
        'created_at', 'updated_at'
    ];
}

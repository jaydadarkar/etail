<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
use App\Model\Product;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_quantity', 'product_total',
        'status', 'tracking_company', 'tracking_id',
        'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->hasOne(\App\Model\Order::class, 'id', 'order_id');
    }

    public function product()
    {
        return $this->hasOne(\App\Model\Product::class, 'id', 'product_id');
    }
}

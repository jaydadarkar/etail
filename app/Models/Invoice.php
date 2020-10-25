<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Invoice extends Model
{
    protected $fillable = [
        'order_id',
        'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->hasOne(\App\Models\Order::class, 'id', 'order_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Invoice;
use App\Model\OrderAddress;
use App\Model\OrderProduct;
use App\Model\Coupon;
use App\Model\Affiliate;

class Order extends Model
{
    protected $fillable = [
        'invoice_id', 'user_id', 'address_line_id',
        'product_line_id', 'order_status', 'order_sub_total',
        'order_total', 'payment_method', 'payment_status',
        'coupon_code', 'affiliate_code',
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

    public function invoice()
    {
        return $this->hasOne(\App\Model\Invoice::class, 'id', 'invoice_id');
    }

    public function address()
    {
        return $this->hasOne(\App\Model\OrderAddress::class, 'id', 'address_line_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Model\OrderProduct::class, 'order_id', 'id');
    }

    public function coupon()
    {
        return $this->hasOne(\App\Model\Coupon::class, 'coupon_code', 'coupon_code');
    }

    public function affiliate()
    {
        return $this->hasOne(\App\Model\Affiliate::class, 'affiliate_code', 'affiliate_code');
    }
}

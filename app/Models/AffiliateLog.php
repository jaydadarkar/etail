<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateLog extends Model
{
    protected $fillable = [
        'affiliate_id', 'order_total', 'settlement_amount', 'settlement_status',
        'created_at', 'updated_at'
    ];
}

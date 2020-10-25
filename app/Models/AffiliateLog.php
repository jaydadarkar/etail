<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Affiliate;

class AffiliateLog extends Model
{
    protected $fillable = [
        'affiliate_id', 'order_total', 'settlement_amount', 'settlement_status',
        'created_at', 'updated_at'
    ];

    public function affiliate()
    {
        return $this->hasOne(\App\Models\Affiliate::class, 'id', 'affiliate_id');
    }
}

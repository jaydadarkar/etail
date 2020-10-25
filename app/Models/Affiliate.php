<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Affiliate extends Model
{
    protected $fillable = [
        'user_id', 'affiliate_code', 'created_at', 'updated_at'
    ];
    
    public function vendor()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

    public function order()
    {
        return $this->hasMany(\App\Model\Order::class, 'affiliate_code', 'affiliate_code');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'user_id', 'affiliate_code', 'created_at', 'updated_at'
    ];
}

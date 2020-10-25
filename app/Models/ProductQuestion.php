<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\User;

class ProductQuestion extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'question', 'answer',
        'created_at', 'updated_at'
    ];

    public function product()
    {
        return $this->hasOne(\App\Models\Product::class, 'id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}

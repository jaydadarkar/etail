<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductQuestion extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'question', 'answer',
        'created_at', 'updated_at'
    ];
}

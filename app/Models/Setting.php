<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'attribute', 'value', 'desc',
        'created_at', 'updated_at'
    ];
}

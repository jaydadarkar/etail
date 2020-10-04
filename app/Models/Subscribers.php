<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $fillable = [
        'email',
        'created_at', 'updated_at'
    ];
}

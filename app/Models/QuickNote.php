<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickNote extends Model
{
    protected $fillable = [
        'user_id','title', 'content',
        'created_at', 'updated_at'
    ];
}

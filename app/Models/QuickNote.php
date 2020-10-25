<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class QuickNote extends Model
{
    protected $fillable = [
        'user_id','title', 'content',
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}

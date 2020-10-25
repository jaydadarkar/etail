<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Marketing extends Model
{
    protected $fillable = [
        'user_id', 'campaign_name', 'campaign_slug', 'subject',
        'post_content', 'email_count', 'cta_clicks',
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}

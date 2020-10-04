<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    protected $fillable = [
        'campaign_name', 'campaign_slug', 'subject',
        'post_content', 'email_count', 'cta_clicks',
        'created_at', 'updated_at'
    ];
}

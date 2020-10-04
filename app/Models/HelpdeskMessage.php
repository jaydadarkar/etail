<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpdeskMessage extends Model
{
    protected $fillable = [
        'enquiry_id', 'user_id', 'message',
        'created_at', 'updated_at'
    ];
}

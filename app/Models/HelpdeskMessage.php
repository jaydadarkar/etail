<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpdesk;
use App\User;

class HelpdeskMessage extends Model
{
    protected $fillable = [
        'enquiry_id', 'user_id', 'message',
        'created_at', 'updated_at'
    ];

    public function enquiry()
    {
        return $this->hasOne(\App\Models\Helpdesk::class, 'enquiry_id', 'enquiry_id');
    }

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

}

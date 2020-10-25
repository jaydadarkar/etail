<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Helpdesk extends Model
{
    protected $fillable = [
        'enquiry_id', 'user_id', 'enquiry_subject',
        'enquiry_pend_response_from', 'enquiry_status',
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }
}

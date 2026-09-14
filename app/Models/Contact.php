<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
    protected $casts = [
        'name' => 'array',
        'email' => 'array',
        'subject' => 'array',
        'message' => 'array',
    ];
}

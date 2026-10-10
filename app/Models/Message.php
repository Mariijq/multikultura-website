<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'field_of_study',
        'year_of_study',
        'address',
        'city',
        'country',
        'zipcode',
        'period',
        'message',
    ];
    protected $casts = [
        'first_name' => 'array',
        'last_name' => 'array',
        'email' => 'array',
        'phone' => 'array',
        'field_of_study' => 'array',
        'year_of_study' => 'array',
        'address' => 'array',
        'city' => 'array',
        'country' => 'array',
        'zipcode' => 'array',
        'period' => 'array',
        'message' => 'array',
    ];
}

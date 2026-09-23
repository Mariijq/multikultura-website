<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'email',
        'address',
        'phone',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'google_maps_link',
    ];
    protected $casts = [
        'email' => 'array',
        'address' => 'array',
        'phone' => 'array',
        'facebook' => 'array',
        'instagram' => 'array',
        'linkedin' => 'array',
        'youtube' => 'array',
    ];
}

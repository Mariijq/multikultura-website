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
        'google_maps_link',
    ];

    protected $casts = [
        'address' => 'array',
    ];
}

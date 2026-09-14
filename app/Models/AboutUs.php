<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'who_we_are',
        'what_we_offer',
        'vision',
        'mission',
    ];

    protected $casts = [
        'who_we_are' => 'array',
        'what_we_offer' => 'array',
        'vision' => 'array',
        'mission' => 'array',
    ];
}

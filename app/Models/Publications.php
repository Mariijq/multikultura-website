<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'detailed_description',
        'image',
        'file',
        'date',
    ];

    protected $casts = [
        'title' => 'array',
        'short_description' => 'array',
        'detailed_description' => 'array',
        'date' => 'date',
    ];
}

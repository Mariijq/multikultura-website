<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
        protected $fillable = [
        'title',
        'subtitle',
        'short_description',
        'detailed_description',
        'image',
        'status',
        'date',
    ];

        protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'short_description' => 'array',
        'detailed_description' => 'array',
        'status' => 'array',
        'date' => 'date',
    ];
}

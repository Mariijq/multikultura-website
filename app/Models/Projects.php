<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
        protected $fillable = [
        'title',
        'short_description',
        'detailed_description',
        'image',
        'status',
        'date',
    ];

        protected $casts = [
        'title' => 'array',
        'short_description' => 'array',
        'detailed_description' => 'array',
        'date' => 'date',
    ];
}

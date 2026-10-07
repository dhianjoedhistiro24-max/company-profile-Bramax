<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'vision',
        'mission',
        'cta',
        'section_order',
        'status',
        'banner',
    ];

    protected $casts = [
        'section_order' => 'integer',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'cta',
        'section_order',
        'status',
        'banner',
    ];

    protected $casts = [
        'section_order' => 'integer',
    ];
}
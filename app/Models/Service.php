<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'service_category_id',
        'solution_id',
        'name',
        'slug',
        'description',
        'icon',
        'image',
    ];

    public function serviceCategory(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function solution(): BelongsTo
    {
        return $this->belongsTo(Solution::class);
    }
}


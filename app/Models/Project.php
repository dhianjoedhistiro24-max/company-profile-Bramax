<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'scope',
        'location',
        'year',
        'status',
        'featured',
        'project_category_id',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'year' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(
            ProjectCategory::class,
            'project_category_id'
        );
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
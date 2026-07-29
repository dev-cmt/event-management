<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'badge_text',
        'experience_years',
        'experience_title',
        'features',
        'gallery_images',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'gallery_images' => 'array',
        'status' => 'boolean',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'link_text',
        'link_url',
        'image',
        'status',
        'order',
    ];
}

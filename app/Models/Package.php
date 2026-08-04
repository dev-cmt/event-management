<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'sort_order',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(PackageItem::class, 'package_id')->orderBy('sort_order', 'asc');
    }
}

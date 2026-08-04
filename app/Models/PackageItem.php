<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'name',
        'slug',
        'image',
        'sort_order',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function galleries()
    {
        return $this->hasMany(PackageGallery::class, 'package_item_id');
    }
}

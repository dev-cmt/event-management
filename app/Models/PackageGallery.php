<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_item_id',
        'caption',
        'image',
    ];

    public function packageItem()
    {
        return $this->belongsTo(PackageItem::class, 'package_item_id');
    }
}

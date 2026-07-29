<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_package_id',
        'name',
        'item_no',
        'order',
    ];

    public function package()
    {
        return $this->belongsTo(MenuPackage::class, 'menu_package_id');
    }
}

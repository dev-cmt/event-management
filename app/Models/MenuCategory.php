<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
        'status',
    ];

    public function packages()
    {
        return $this->hasMany(MenuPackage::class, 'menu_category_id')->orderBy('order', 'asc');
    }

    public function activePackages()
    {
        return $this->hasMany(MenuPackage::class, 'menu_category_id')->where('status', true)->orderBy('order', 'asc');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name') && empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }
}

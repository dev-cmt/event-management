<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_category_id',
        'name',
        'slug',
        'subtitle',
        'image',
        'price',
        'order',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_package_id')->orderBy('item_no', 'asc')->orderBy('order', 'asc');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $baseSlug = Str::slug($model->name);
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }
                $model->slug = $slug;
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name') && empty($model->slug)) {
                $baseSlug = Str::slug($model->name);
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->where('id', '!=', $model->id)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }
                $model->slug = $slug;
            }
        });
    }
}

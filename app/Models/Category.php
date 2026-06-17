<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status_id',
    ];
// Relation with Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug) && !empty($category->name)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if (!empty($category->name)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}

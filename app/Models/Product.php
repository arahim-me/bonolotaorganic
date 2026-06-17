<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'stock',
        'thumbnail',
        'images',
        'status_id',
    ];
    // Relation with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Accessor for category name
    public function getCategoryNameAttribute(): ?string
    {
        return $this->category?->name;
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    protected $casts = [
        'images' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->slug) && !empty($product->name)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if (!empty($product->name)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}

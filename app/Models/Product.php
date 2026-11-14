<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'slug',
        'type',
        'brand_id',
        'model_id',
        'variant_id',
        'pack_size',
        'short_description',
        'description',
        'old_price',
        'highlight',
        'discount',
        'price',
        'stock',
        'thumbnail',
        'images',
        'views',
        'sales',
        'is_published',
        'status_id',
    ];

    // Attribute casting
    protected $casts = [
        'images' => 'array',
        'colors' => 'array',
        'sizes' => 'array',
    ];

    // Relation with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Accessor for category name
    public function getCategoryNameAttribute(): ?string
    {
        return $this->category?->name;
    }
    // Relation with product sizes
    public function sizes()
    {
        return $this->hasMany(Size::class, 'product_id', 'id');
    }
    // Relation with product colors
    public function colors()
    {
        return $this->hasMany(Color::class, 'product_id', 'id');
    }

    // Relation with Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    // Relation with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relation with Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    // Relation with Model
    public function model()
    {
        return $this->belongsTo(ProductModel::class, 'model_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

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

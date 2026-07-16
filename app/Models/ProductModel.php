<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $fillable = ['name', 'slug', 'brand_id',  'description', 'category_id', 'status_id'];

    // Relation with Status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
    // Relation with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    // Relation with Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}

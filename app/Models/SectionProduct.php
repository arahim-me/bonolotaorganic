<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionProduct extends Model
{
    protected $fillable = [
        'section_id',
        'product_id',
        'is_published',
    ];


    // Relation with product sections
    public function section()
    {
        return $this->belongsTo(ProductSection::class, 'section_id', 'id');
    }

    // Relation with products
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

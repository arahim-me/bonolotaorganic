<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionProduct extends Model
{
    protected $fillable = [
        'user_id',
        'section_id',
        'product_id',
        'status_id',
    ];

    // Relation with users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

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

    // Relation with statuses
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'position',
        'description',
        'image',
        'return_url',
        'is_publised',
    ];

    public function sectionImages()
    {
        return $this->hasMany(SectionImage::class, 'section_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionImage extends Model
{
    protected $fillable = [
        'section_id',
        'title',
        'slug',
        'sub_title',
        'description',
        'button',
        'image',
        'return_url',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function section()
    {
        return $this->belongsTo(ProductSection::class, 'section_id');
    }
}

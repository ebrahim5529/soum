<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slider extends Model
{
    protected $fillable = [
        'title', 'description', 'background_image', 'price', 'price_label',
        'property_type', 'service_type', 'location', 'area', 'badge',
        'badge_color', 'likes_count', 'property_id', 'is_active', 'order'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}

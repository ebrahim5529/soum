<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'area', 'bedrooms', 'bathrooms',
        'floors', 'floor_number', 'property_type_id', 'service_type_id',
        'city_id', 'district', 'status', 'featured_status', 'likes_count',
        'image', 'is_featured', 'google_map_url', 'license_number'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'area' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class)->orderBy('order');
    }

    /**
     * Get the full URL for the main image
     */
    public function getMainImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/placeholder.jpg');
        }

        // If it's already a full URL, return it
        if (str_starts_with($this->image, 'http') || str_starts_with($this->image, '/')) {
            return $this->image;
        }

        return route('images.show', ['path' => $this->image]);
    }
}

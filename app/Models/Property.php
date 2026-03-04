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

    public function videos(): HasMany
    {
        return $this->hasMany(PropertyVideo::class)->orderBy('order');
    }

    /**
     * Get the full URL for the main image
     */
    public function getMainImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/placeholder.jpg');
        }

        if (str_starts_with($this->image, 'http') || str_starts_with($this->image, '/')) {
            return $this->image;
        }

        return url('/images/' . $this->image);
    }

    /**
     * Get the Google Maps URL for navigation - uses google_map_url if set, otherwise builds from address
     */
    public function getGoogleMapsLinkAttribute(): string
    {
        $input = trim((string) $this->attributes['google_map_url'] ?? '');
        if ($input !== '') {
            $url = $this->extractGoogleMapsUrl($input);
            if ($url !== '') {
                return $url;
            }
        }

        $address = $this->city->name . ($this->district ? ' - ' . $this->district : '') . '، السعودية';
        return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address);
    }

    /**
     * Extract a clean Google Maps place URL from various input formats
     */
    protected function extractGoogleMapsUrl(string $input): string
    {
        $input = trim($input);
        if ($input === '') return '';

        // Extract URL from embed iframe: src="...".
        if (preg_match('~src=["\']([^"\']*google\.com/maps[^"\']*)["\']~', $input, $m)) {
            $input = html_entity_decode($m[1]);
        }

        // Already a direct place URL: https://www.google.com/maps/place/26.091855,43.980515 or place/Name/@lat,lng
        if (preg_match('~https?://(?:www\.)?google\.com/maps/place/[^?&\s]+~', $input, $m)) {
            return preg_replace('~[?&].*$~', '', $m[0]);
        }

        // Extract coordinates lat,lng (e.g. 26.091855,43.980515)
        if (preg_match('~(-?\d+\.\d+),\s*(-?\d+\.\d+)~', $input, $m)) {
            return 'https://www.google.com/maps/place/' . $m[1] . ',' . $m[2];
        }

        // General maps URL
        if (preg_match('~(https?://(?:www\.)?google\.com/maps[^\s"\'<>]+)~', $input, $m)) {
            return $m[1];
        }

        return '';
    }
}

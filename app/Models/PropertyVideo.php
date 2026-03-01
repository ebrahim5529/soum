<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyVideo extends Model
{
    protected $fillable = ['property_id', 'video_path', 'title', 'order'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Get the full URL for the video
     */
    public function getVideoUrlAttribute()
    {
        if (!$this->video_path) {
            return null;
        }

        // If it's already a full URL (YouTube, Vimeo, etc.), return it
        if (str_starts_with($this->video_path, 'http') || str_starts_with($this->video_path, '//')) {
            return $this->video_path;
        }

        return asset('storage/' . $this->video_path);
    }

    /**
     * Check if the video is an external URL (YouTube, Vimeo, etc.)
     */
    public function isExternalUrl()
    {
        return str_starts_with($this->video_path, 'http') || str_starts_with($this->video_path, '//');
    }

    /**
     * Get video type for player (youtube, vimeo, or local)
     */
    public function getVideoTypeAttribute()
    {
        if (!$this->video_path) {
            return null;
        }

        if (str_contains($this->video_path, 'youtube.com') || str_contains($this->video_path, 'youtu.be')) {
            return 'youtube';
        }

        if (str_contains($this->video_path, 'vimeo.com')) {
            return 'vimeo';
        }

        return 'local';
    }

    /**
     * Extract YouTube video ID from URL
     */
    public function getYouTubeVideoId()
    {
        if (!$this->isExternalUrl() || $this->video_type !== 'youtube') {
            return null;
        }

        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        preg_match($pattern, $this->video_path, $matches);

        return $matches[1] ?? null;
    }

    /**
     * Extract Vimeo video ID from URL
     */
    public function getVimeoVideoId()
    {
        if (!$this->isExternalUrl() || $this->video_type !== 'vimeo') {
            return null;
        }

        $pattern = '/vimeo\.com\/(?:video\/)?(\d+)/';
        preg_match($pattern, $this->video_path, $matches);

        return $matches[1] ?? null;
    }
}
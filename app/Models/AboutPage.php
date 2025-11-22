<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'introduction',
        'vision_title',
        'vision_content',
        'mission_title',
        'mission_content',
        'team_description'
    ];
}

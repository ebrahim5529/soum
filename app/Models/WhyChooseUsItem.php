<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUsItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'icon_color',
        'order'
    ];
}

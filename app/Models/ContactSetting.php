<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'address',
        'google_map_embed',
        'phone_1',
        'phone_2',
        'phone_3',
        'email',
        'working_hours_office',
        'working_hours_online',
    ];
}

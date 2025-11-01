<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceType extends Model
{
    protected $fillable = ['name', 'name_en'];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}

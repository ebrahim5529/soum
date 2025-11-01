<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'للبيع', 'name_en' => 'For Sale'],
            ['name' => 'للإيجار', 'name_en' => 'For Rent'],
            ['name' => 'للاستثمار', 'name_en' => 'For Investment'],
        ];

        foreach ($types as $type) {
            ServiceType::create($type);
        }
    }
}

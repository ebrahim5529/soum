<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'فيلا', 'name_en' => 'Villa', 'icon' => 'ri-home-line'],
            ['name' => 'شقة', 'name_en' => 'Apartment', 'icon' => 'ri-building-line'],
            ['name' => 'أرض', 'name_en' => 'Land', 'icon' => 'ri-landscape-line'],
            ['name' => 'محل تجاري', 'name_en' => 'Commercial', 'icon' => 'ri-store-line'],
        ];

        foreach ($types as $type) {
            PropertyType::updateOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
}

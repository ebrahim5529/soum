<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['name' => 'الرياض', 'name_en' => 'Riyadh'],
            ['name' => 'جدة', 'name_en' => 'Jeddah'],
            ['name' => 'الدمام', 'name_en' => 'Dammam'],
            ['name' => 'مكة المكرمة', 'name_en' => 'Makkah'],
            ['name' => 'المدينة المنورة', 'name_en' => 'Madinah'],
        ];

        foreach ($cities as $city) {
            City::updateOrCreate(
                ['name' => $city['name']],
                $city
            );
        }
    }
}

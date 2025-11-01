<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء مستخدم مسؤول
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // تشغيل Seeders بالترتيب
        $this->call([
            CitySeeder::class,
            PropertyTypeSeeder::class,
            ServiceTypeSeeder::class,
            ServiceSeeder::class,
            PropertySeeder::class,
            SliderSeeder::class,
        ]);
    }
}

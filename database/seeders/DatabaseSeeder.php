<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء مستخدم مسؤول (مع تجنب التكرار)
        User::updateOrCreate(
            ['email' => 'admin@aqar.com'],
            [
                'name' => 'مدير النظام',
                'password' => bcrypt('admin123'),
            ]
        );

        // إنشاء مستخدم أدمن جديد
        User::updateOrCreate(
            ['email' => 'admin@soum1.com'],
            [
                'name' => 'مدير النظام - soum1',
                'password' => bcrypt('admin123'),
            ]
        );

        // إنشاء مستخدم عادي للاختبار
        User::updateOrCreate(
            ['email' => 'user@aqar.com'],
            [
                'name' => 'مستخدم تجريبي',
                'password' => bcrypt('user123'),
            ]
        );

        // تشغيل Seeders بالترتيب
        $this->call([
            CitySeeder::class,
            PropertyTypeSeeder::class,
            ServiceTypeSeeder::class,
            ServiceSeeder::class,
            PropertySeeder::class,
            SliderSeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'البيع والشراء',
                'description' => 'خدمات متكاملة لبيع وشراء العقارات بأفضل الأسعار والشروط',
                'icon' => 'ri-home-4-line',
                'icon_color' => 'blue',
                'order' => 1,
            ],
            [
                'title' => 'الإيجار',
                'description' => 'إدارة عقود الإيجار والعقارات المؤجرة بمهنية عالية',
                'icon' => 'ri-key-line',
                'icon_color' => 'green',
                'order' => 2,
            ],
            [
                'title' => 'التقييم',
                'description' => 'تقييم دقيق للعقارات من قبل خبراء معتمدين',
                'icon' => 'ri-line-chart-line',
                'icon_color' => 'purple',
                'order' => 3,
            ],
            [
                'title' => 'المزادات',
                'description' => 'تنظيم وإدارة المزادات العقارية الإلكترونية',
                'icon' => 'ri-auction-line',
                'icon_color' => 'orange',
                'order' => 4,
            ],
            [
                'title' => 'الاستثمار',
                'description' => 'استشارات استثمارية وفرص استثمارية مربحة',
                'icon' => 'ri-money-dollar-circle-line',
                'icon_color' => 'teal',
                'order' => 5,
            ],
            [
                'title' => 'الاستشارات',
                'description' => 'استشارات عقارية متخصصة وخدمة عملاء متميزة',
                'icon' => 'ri-customer-service-2-line',
                'icon_color' => 'red',
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statistics = [
            [
                'number' => '+1000',
                'label' => 'عقار متاح',
                'icon' => 'ri-home-line',
                'order' => 1,
            ],
            [
                'number' => '+500',
                'label' => 'عميل راضٍ',
                'icon' => 'ri-user-smile-line',
                'order' => 2,
            ],
            [
                'number' => '+10',
                'label' => 'سنوات خبرة',
                'icon' => 'ri-calendar-check-line',
                'order' => 3,
            ],
            [
                'number' => '+50',
                'label' => 'عامل متخصص',
                'icon' => 'ri-team-line',
                'order' => 4,
            ],
        ];

        foreach ($statistics as $statistic) {
            Statistic::create($statistic);
        }
    }
}

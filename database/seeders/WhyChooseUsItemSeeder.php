<?php

namespace Database\Seeders;

use App\Models\WhyChooseUsItem;
use Illuminate\Database\Seeder;

class WhyChooseUsItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'موثوقية عالية',
                'description' => 'أكثر من 10 سنوات من الخبرة والثقة المتراكمة في السوق العقاري السعودي',
                'icon' => 'ri-shield-check-line',
                'icon_color' => 'primary',
                'order' => 1,
            ],
            [
                'title' => 'فريق متخصص',
                'description' => 'فريق من الخبراء المتخصصين في جميع جوانب العقارات والاستثمار العقاري',
                'icon' => 'ri-team-line',
                'icon_color' => 'green',
                'order' => 2,
            ],
            [
                'title' => 'خدمة عملاء متميزة',
                'description' => 'نقدم دعمًا مستمرًا ومتابعة دقيقة لجميع عملائنا في جميع مراحل المعاملة',
                'icon' => 'ri-customer-service-2-line',
                'icon_color' => 'purple',
                'order' => 3,
            ],
            [
                'title' => 'أسعار تنافسية',
                'description' => 'أفضل الأسعار والعروض المميزة في السوق مع ضمان القيمة الحقيقية',
                'icon' => 'ri-price-tag-3-line',
                'icon_color' => 'orange',
                'order' => 4,
            ],
            [
                'title' => 'سرعة في التنفيذ',
                'description' => 'ننهي جميع المعاملات والإجراءات القانونية في أقصر وقت ممكن',
                'icon' => 'ri-time-line',
                'icon_color' => 'teal',
                'order' => 5,
            ],
            [
                'title' => 'جودة عالية',
                'description' => 'نقدم خدمات بجودة عالية ومهنية مع ضمان رضا العملاء التام',
                'icon' => 'ri-award-line',
                'icon_color' => 'red',
                'order' => 6,
            ],
        ];

        foreach ($items as $item) {
            WhyChooseUsItem::create($item);
        }
    }
}

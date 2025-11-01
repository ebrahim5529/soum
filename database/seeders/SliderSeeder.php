<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'فيلا فاخرة بمسبح خاص',
                'description' => null,
                'background_image' => 'https://readdy.ai/api/search-image?query=luxury%20modern%20villa%20with%20beautiful%20garden%20and%20swimming%20pool%2C%20elegant%20architecture%2C%20bright%20daylight%2C%20professional%20real%20estate%20photography%2C%20high%20quality%2C%20clean%20background%2C%20contemporary%20design&width=1920&height=600&seq=hero1&orientation=landscape',
                'price' => 2500000,
                'price_label' => null,
                'property_type' => 'فيلا - دورين',
                'service_type' => 'للبيع',
                'location' => 'الرياض - حي النرجس',
                'area' => '450 متر مربع',
                'badge' => 'جديد',
                'badge_color' => 'red',
                'likes_count' => 245,
                'property_id' => null,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'شقة عصرية بإطلالة رائعة',
                'description' => null,
                'background_image' => 'https://readdy.ai/api/search-image?query=modern%20apartment%20building%20exterior%20with%20balconies%2C%20urban%20architecture%2C%20daylight%20photography%2C%20real%20estate%20listing%2C%20professional%20quality%2C%20clean%20contemporary%20design&width=1920&height=600&seq=hero2&orientation=landscape',
                'price' => 4500,
                'price_label' => 'شهرياً',
                'property_type' => 'شقة - الطابق الخامس',
                'service_type' => 'للإيجار',
                'location' => 'جدة - حي الزهراء',
                'area' => '180 متر مربع',
                'badge' => 'مميز',
                'badge_color' => 'green',
                'likes_count' => 189,
                'property_id' => null,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'أرض تجارية مميزة',
                'description' => null,
                'background_image' => 'https://readdy.ai/api/search-image?query=commercial%20land%20plot%20with%20clear%20boundaries%2C%20investment%20opportunity%2C%20aerial%20view%2C%20real%20estate%20development%2C%20professional%20photography%2C%20modern%20urban%20planning&width=1920&height=600&seq=hero3&orientation=landscape',
                'price' => 8000000,
                'price_label' => null,
                'property_type' => 'أرض - تجارية',
                'service_type' => 'للاستثمار',
                'location' => 'الدمام - حي الشاطئ',
                'area' => '2000 متر مربع',
                'badge' => 'استثمار',
                'badge_color' => 'blue',
                'likes_count' => 312,
                'property_id' => null,
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}

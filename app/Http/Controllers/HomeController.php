<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    public function index()
    {
        $fallbackSliders = collect([
            [
                'title' => 'فيلا فاخرة بمسبح خاص',
                'description' => null,
                'background_image' => 'https://readdy.ai/api/search-image?query=luxury%20modern%20villa%20with%20beautiful%20garden%20and%20swimming%20pool%2C%20elegant%20architecture%2C%20bright%20daylight%2C%20professional%20real%20estate%20photography%2C%20high%20quality%2C%20clean%20background%2C%20contemporary%20design&width=1920&height=600&seq=hero1&orientation=landscape',
                'price' => 2_500_000,
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
                'price' => 4_500,
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
                'price' => 8_000_000,
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
        ])->map(fn ($item) => (object) $item);

        $fallbackPropertyTypes = collect([
            ['id' => 1, 'name' => 'فيلا'],
            ['id' => 2, 'name' => 'شقة'],
            ['id' => 3, 'name' => 'أرض'],
            ['id' => 4, 'name' => 'محل تجاري'],
        ])->map(fn ($item) => (object) $item);

        $fallbackServiceTypes = collect([
            ['id' => 1, 'name' => 'للبيع'],
            ['id' => 2, 'name' => 'للإيجار'],
            ['id' => 3, 'name' => 'للاستثمار'],
        ])->map(fn ($item) => (object) $item);

        $fallbackCities = collect([
            ['id' => 1, 'name' => 'الرياض'],
            ['id' => 2, 'name' => 'جدة'],
            ['id' => 3, 'name' => 'الدمام'],
            ['id' => 4, 'name' => 'مكة المكرمة'],
            ['id' => 5, 'name' => 'المدينة المنورة'],
        ])->map(fn ($item) => (object) $item);

        $fallbackServices = collect([
            [
                'title' => 'البيع والشراء',
                'description' => 'خدمات متكاملة لبيع وشراء العقارات بأفضل الأسعار والشروط',
                'icon' => 'ri-home-4-line',
                'icon_color' => 'blue',
            ],
            [
                'title' => 'الإيجار',
                'description' => 'إدارة عقود الإيجار والعقارات المؤجرة بمهنية عالية',
                'icon' => 'ri-key-line',
                'icon_color' => 'green',
            ],
            [
                'title' => 'التقييم',
                'description' => 'تقييم دقيق للعقارات من قبل خبراء معتمدين',
                'icon' => 'ri-line-chart-line',
                'icon_color' => 'purple',
            ],
            [
                'title' => 'المزادات',
                'description' => 'تنظيم وإدارة المزادات العقارية الإلكترونية',
                'icon' => 'ri-auction-line',
                'icon_color' => 'orange',
            ],
            [
                'title' => 'الاستثمار',
                'description' => 'استشارات استثمارية وفرص استثمارية مربحة',
                'icon' => 'ri-money-dollar-circle-line',
                'icon_color' => 'teal',
            ],
            [
                'title' => 'الاستشارات',
                'description' => 'استشارات عقارية متخصصة وخدمة عملاء متميزة',
                'icon' => 'ri-customer-service-2-line',
                'icon_color' => 'red',
            ],
        ])->map(fn ($item) => (object) $item);

        $fallbackFeaturedProperties = collect([
            [
                'id' => null,
                'title' => 'فيلا عصرية بحديقة',
                'main_image' => 'https://readdy.ai/api/search-image?query=luxury%20modern%20villa%20exterior%20with%20garden%2C%20real%20estate%20photography%2C%20bright%20daylight%2C%20professional%20quality%2C%20clean%20background%2C%20elegant%20architecture&width=400&height=250&seq=prop1&orientation=landscape',
                'featured_status' => 'جديد',
                'likes_count' => 156,
                'city_name' => 'الرياض',
                'district' => 'حي العليا',
                'property_type_name' => 'فيلا',
                'property_type_icon' => 'ri-home-line',
                'floor_number' => null,
                'area' => 380,
                'price' => 1_850_000,
                'service_type_name' => 'للبيع',
                'details_url' => 'https://osum.savepoints.sa/properties/1',
            ],
            [
                'id' => null,
                'title' => 'شقة حديثة مفروشة',
                'main_image' => 'https://readdy.ai/api/search-image?query=modern%20apartment%20building%20with%20balconies%2C%20urban%20residential%20architecture%2C%20professional%20real%20estate%20photo%2C%20clean%20contemporary%20design&width=400&height=250&seq=prop2&orientation=landscape',
                'featured_status' => null,
                'likes_count' => 89,
                'city_name' => 'جدة',
                'district' => 'حي الروضة',
                'property_type_name' => 'شقة - الطابق الثالث',
                'property_type_icon' => 'ri-building-line',
                'floor_number' => null,
                'area' => 150,
                'price' => 3_200,
                'service_type_name' => 'للإيجار',
                'details_url' => 'https://osum.savepoints.sa/properties/2',
            ],
            [
                'id' => null,
                'title' => 'أرض تجارية مميزة',
                'main_image' => 'https://readdy.ai/api/search-image?query=commercial%20land%20plot%20for%20development%2C%20investment%20opportunity%2C%20clear%20boundaries%2C%20aerial%20view%2C%20real%20estate%20development%20site&width=400&height=250&seq=prop3&orientation=landscape',
                'featured_status' => 'استثمار',
                'likes_count' => 234,
                'city_name' => 'الدمام',
                'district' => 'الكورنيش',
                'property_type_name' => 'أرض',
                'property_type_icon' => 'ri-landscape-line',
                'floor_number' => null,
                'area' => 1_500,
                'price' => 5_500_000,
                'service_type_name' => 'للاستثمار',
                'details_url' => 'https://osum.savepoints.sa/properties/3',
            ],
        ])->map(fn ($item) => (object) $item);

        try {
            $sliders = Schema::hasTable('sliders') 
                ? Slider::where('is_active', true)->orderBy('order')->get() 
                : collect();
            
            $propertyTypes = Schema::hasTable('property_types') 
                ? PropertyType::all() 
                : collect();
            
            $serviceTypes = Schema::hasTable('service_types') 
                ? ServiceType::all() 
                : collect();
            
            $cities = Schema::hasTable('cities') 
                ? City::all() 
                : collect();
            
            $services = Schema::hasTable('services') 
                ? Service::orderBy('order')->get() 
                : collect();
            
            $featuredProperties = Schema::hasTable('properties') 
                ? Property::where('is_featured', true)
                    ->with(['propertyType', 'serviceType', 'city'])
                    ->take(6)
                    ->get()
                : collect();
        } catch (\Exception $e) {
            // في حالة وجود أي خطأ، نستخدم قيم افتراضية فارغة
            $sliders = collect();
            $propertyTypes = collect();
            $serviceTypes = collect();
            $cities = collect();
            $services = collect();
            $featuredProperties = collect();
        }

        if ($sliders->isEmpty()) {
            $sliders = $fallbackSliders;
        }

        if ($propertyTypes->isEmpty()) {
            $propertyTypes = $fallbackPropertyTypes;
        }

        if ($serviceTypes->isEmpty()) {
            $serviceTypes = $fallbackServiceTypes;
        }

        if ($cities->isEmpty()) {
            $cities = $fallbackCities;
        }

        if ($services->isEmpty()) {
            $services = $fallbackServices;
        }

        if ($featuredProperties->isEmpty()) {
            $featuredProperties = $fallbackFeaturedProperties;
        }

        return view('home', compact('sliders', 'propertyTypes', 'serviceTypes', 'cities', 'services', 'featuredProperties'));
    }
}

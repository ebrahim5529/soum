<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            [
                'title' => 'فيلا عصرية بحديقة',
                'description' => 'فيلا فاخرة بحديقة واسعة ومسبح خاص',
                'price' => 1850000,
                'area' => 380,
                'bedrooms' => 5,
                'bathrooms' => 4,
                'floors' => 2,
                'floor_number' => null,
                'property_type_id' => 1, // فيلا
                'service_type_id' => 1, // للبيع
                'city_id' => 1, // الرياض
                'district' => 'حي العليا',
                'status' => 'available',
                'featured_status' => 'جديد',
                'likes_count' => 156,
                'main_image' => 'https://readdy.ai/api/search-image?query=luxury%20modern%20villa%20exterior%20with%20garden%2C%20real%20estate%20photography%2C%20bright%20daylight%2C%20professional%20quality%2C%20clean%20background%2C%20elegant%20architecture&width=400&height=250&seq=prop1&orientation=landscape',
                'is_featured' => true,
            ],
            [
                'title' => 'شقة حديثة مفروشة',
                'description' => 'شقة حديثة ومفروشة بالكامل بإطلالة رائعة',
                'price' => 3200,
                'area' => 150,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'floors' => 1,
                'floor_number' => 'الطابق الثالث',
                'property_type_id' => 2, // شقة
                'service_type_id' => 2, // للإيجار
                'city_id' => 2, // جدة
                'district' => 'حي الروضة',
                'status' => 'available',
                'featured_status' => null,
                'likes_count' => 89,
                'main_image' => 'https://readdy.ai/api/search-image?query=modern%20apartment%20building%20with%20balconies%2C%20urban%20residential%20architecture%2C%20professional%20real%20estate%20photo%2C%20clean%20contemporary%20design&width=400&height=250&seq=prop2&orientation=landscape',
                'is_featured' => true,
            ],
            [
                'title' => 'أرض تجارية مميزة',
                'description' => 'أرض تجارية مميزة في موقع استراتيجي',
                'price' => 5500000,
                'area' => 1500,
                'bedrooms' => null,
                'bathrooms' => null,
                'floors' => null,
                'floor_number' => null,
                'property_type_id' => 3, // أرض
                'service_type_id' => 3, // للاستثمار
                'city_id' => 3, // الدمام
                'district' => 'الكورنيش',
                'status' => 'available',
                'featured_status' => 'استثمار',
                'likes_count' => 234,
                'main_image' => 'https://readdy.ai/api/search-image?query=commercial%20land%20plot%20for%20development%2C%20investment%20opportunity%2C%20clear%20boundaries%2C%20aerial%20view%2C%20real%20estate%20development%20site&width=400&height=250&seq=prop3&orientation=landscape',
                'is_featured' => true,
            ],
        ];

        foreach ($properties as $property) {
            $prop = Property::create($property);
            
            // إضافة صورة رئيسية كصورة إضافية أيضاً
            PropertyImage::create([
                'property_id' => $prop->id,
                'image_path' => $property['main_image'],
                'order' => 0,
            ]);
        }
    }
}

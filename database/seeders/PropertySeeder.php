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
                'city_id' => 2, // عنيزة
                'district' => 'حي الفاخرية',
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
                'city_id' => 2, // عنيزة
                'district' => 'طريق عمربن الخطاب',
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
                'city_id' => 2, // عنيزة
                'district' => 'حي الفاخرية',
                'status' => 'available',
                'featured_status' => 'استثمار',
                'likes_count' => 234,
                'main_image' => 'https://readdy.ai/api/search-image?query=commercial%20land%20plot%20for%20development%2C%20investment%20opportunity%2C%20clear%20boundaries%2C%20aerial%20view%2C%20real%20estate%20development%20site&width=400&height=250&seq=prop3&orientation=landscape',
                'is_featured' => true,
            ],
        ];

        // التأكد من وجود المدن وأنواع العقارات وأنواع الخدمات
        $city = \App\Models\City::where('name', 'عنيزة')->first();
        if (!$city) {
            $city = \App\Models\City::create(['name' => 'عنيزة', 'name_en' => 'Unaizah']);
        }
        
        $propertyTypeVilla = \App\Models\PropertyType::where('name', 'فيلا')->first();
        $propertyTypeApartment = \App\Models\PropertyType::where('name', 'شقة')->first();
        $propertyTypeLand = \App\Models\PropertyType::where('name', 'أرض')->first();
        
        $serviceTypeSale = \App\Models\ServiceType::where('name', 'للبيع')->first();
        $serviceTypeRent = \App\Models\ServiceType::where('name', 'للإيجار')->first();
        $serviceTypeInvestment = \App\Models\ServiceType::where('name', 'للاستثمار')->first();
        
        // تحديث معرفات المدينة وأنواع العقارات والخدمات
        $properties[0]['city_id'] = $city->id;
        $properties[0]['property_type_id'] = $propertyTypeVilla ? $propertyTypeVilla->id : 1;
        $properties[0]['service_type_id'] = $serviceTypeSale ? $serviceTypeSale->id : 1;
        
        $properties[1]['city_id'] = $city->id;
        $properties[1]['property_type_id'] = $propertyTypeApartment ? $propertyTypeApartment->id : 2;
        $properties[1]['service_type_id'] = $serviceTypeRent ? $serviceTypeRent->id : 2;
        
        $properties[2]['city_id'] = $city->id;
        $properties[2]['property_type_id'] = $propertyTypeLand ? $propertyTypeLand->id : 3;
        $properties[2]['service_type_id'] = $serviceTypeInvestment ? $serviceTypeInvestment->id : 3;
        
        foreach ($properties as $property) {
            $prop = Property::firstOrCreate(
                ['title' => $property['title']],
                $property
            );
            
            // تحديث البيانات إذا كانت موجودة
            if ($prop->wasRecentlyCreated === false) {
                $prop->update($property);
            }
            
            // إضافة صورة رئيسية كصورة إضافية أيضاً إذا لم تكن موجودة
            if (!\App\Models\PropertyImage::where('property_id', $prop->id)->where('image_path', $property['main_image'])->exists()) {
                PropertyImage::create([
                    'property_id' => $prop->id,
                    'image_path' => $property['main_image'],
                    'order' => 0,
                ]);
            }
        }
    }
}

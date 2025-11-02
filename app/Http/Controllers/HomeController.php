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

        return view('home', compact('sliders', 'propertyTypes', 'serviceTypes', 'cities', 'services', 'featuredProperties'));
    }
}

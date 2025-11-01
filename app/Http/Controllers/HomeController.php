<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $propertyTypes = PropertyType::all();
        $serviceTypes = ServiceType::all();
        $cities = City::all();
        $services = Service::orderBy('order')->get();
        $featuredProperties = Property::where('is_featured', true)
            ->with(['propertyType', 'serviceType', 'city'])
            ->take(6)
            ->get();

        return view('home', compact('sliders', 'propertyTypes', 'serviceTypes', 'cities', 'services', 'featuredProperties'));
    }
}

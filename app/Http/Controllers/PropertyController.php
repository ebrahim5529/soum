<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with(['propertyType', 'serviceType', 'city']);

        // Filter by property type
        if ($request->filled('property_type')) {
            $query->where('property_type_id', $request->property_type);
        }

        // Filter by service type
        if ($request->filled('service_type')) {
            $query->where('service_type_id', $request->service_type);
        }

        // Filter by city
        if ($request->filled('city')) {
            $query->where('city_id', $request->city);
        }

        // Filter by price range
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        $properties = $query->latest()->paginate(12);

        $propertyTypes = PropertyType::all();
        $serviceTypes = ServiceType::all();
        $cities = City::all();

        return view('properties.index', compact('properties', 'propertyTypes', 'serviceTypes', 'cities'));
    }

    public function show(Property $property)
    {
        $property->load(['propertyType', 'serviceType', 'city', 'images']);

        return view('properties.show', compact('property'));
    }
}

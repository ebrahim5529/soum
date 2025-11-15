<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (!Schema::hasTable('properties')) {
                $properties = new LengthAwarePaginator([], 0, 12, 1, ['path' => $request->url(), 'query' => $request->query()]);
                $propertyTypes = collect();
                $serviceTypes = collect();
                $cities = collect();
            } else {
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

                $propertyTypes = Schema::hasTable('property_types') ? PropertyType::orderBy('name')->distinct()->get() : collect();
                $serviceTypes = Schema::hasTable('service_types') ? ServiceType::orderBy('name')->distinct()->get() : collect();
                $cities = Schema::hasTable('cities') ? City::orderBy('name')->distinct()->get() : collect();
            }
        } catch (\Exception $e) {
            $properties = new LengthAwarePaginator([], 0, 12, 1, ['path' => $request->url(), 'query' => $request->query()]);
            $propertyTypes = collect();
            $serviceTypes = collect();
            $cities = collect();
        }

        return view('properties.index', compact('properties', 'propertyTypes', 'serviceTypes', 'cities'));
    }

    public function show(Property $property)
    {
        try {
            $property->load(['propertyType', 'serviceType', 'city', 'images']);
        } catch (\Exception $e) {
            abort(404);
        }

        return view('properties.show', compact('property'));
    }
}

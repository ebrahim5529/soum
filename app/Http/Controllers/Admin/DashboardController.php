<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Property;
use App\Models\Slider;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $totalProperties = Schema::hasTable('properties') ? Property::count() : 0;
            $availableProperties = Schema::hasTable('properties') ? Property::where('status', 'available')->count() : 0;
            $featuredProperties = Schema::hasTable('properties') ? Property::where('is_featured', true)->count() : 0;
            $totalSliders = Schema::hasTable('sliders') ? Slider::count() : 0;
            $activeSliders = Schema::hasTable('sliders') ? Slider::where('is_active', true)->count() : 0;
            $totalServices = Schema::hasTable('services') ? Service::count() : 0;
            $totalContacts = Schema::hasTable('contacts') ? Contact::count() : 0;
            $unreadContacts = Schema::hasTable('contacts') ? Contact::where('is_read', false)->count() : 0;

            $recentProperties = Schema::hasTable('properties') 
                ? Property::with(['propertyType', 'serviceType', 'city'])
                    ->latest()
                    ->take(5)
                    ->get()
                : collect();
        } catch (\Exception $e) {
            $totalProperties = 0;
            $availableProperties = 0;
            $featuredProperties = 0;
            $totalSliders = 0;
            $activeSliders = 0;
            $totalServices = 0;
            $totalContacts = 0;
            $unreadContacts = 0;
            $recentProperties = collect();
        }

        return view('admin.dashboard', compact(
            'totalProperties',
            'availableProperties',
            'featuredProperties',
            'totalSliders',
            'activeSliders',
            'totalServices',
            'totalContacts',
            'unreadContacts',
            'recentProperties'
        ));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Property;
use App\Models\Slider;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();
        $availableProperties = Property::where('status', 'available')->count();
        $featuredProperties = Property::where('is_featured', true)->count();
        $totalSliders = Slider::count();
        $activeSliders = Slider::where('is_active', true)->count();
        $totalServices = Service::count();
        $totalContacts = Contact::count();
        $unreadContacts = Contact::where('is_read', false)->count();

        $recentProperties = Property::with(['propertyType', 'serviceType', 'city'])
            ->latest()
            ->take(5)
            ->get();

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

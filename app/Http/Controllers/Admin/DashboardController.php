<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
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
            // تحسين الاستعلامات: استخدام aggregate queries بدلاً من استعلامات متعددة
            $stats = [];
            
            if (Schema::hasTable('properties')) {
                $propertyStats = Property::selectRaw('
                    COUNT(*) as total,
                    SUM(CASE WHEN status = "available" THEN 1 ELSE 0 END) as available,
                    SUM(CASE WHEN is_featured = 1 THEN 1 ELSE 0 END) as featured
                ')->first();
                
                $totalProperties = $propertyStats->total ?? 0;
                $availableProperties = $propertyStats->available ?? 0;
                $featuredProperties = $propertyStats->featured ?? 0;
            } else {
                $totalProperties = 0;
                $availableProperties = 0;
                $featuredProperties = 0;
            }

            if (Schema::hasTable('sliders')) {
                $sliderStats = Slider::selectRaw('
                    COUNT(*) as total,
                    SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) as active
                ')->first();
                
                $totalSliders = $sliderStats->total ?? 0;
                $activeSliders = $sliderStats->active ?? 0;
            } else {
                $totalSliders = 0;
                $activeSliders = 0;
            }

            if (Schema::hasTable('services')) {
                $totalServices = Service::count();
            } else {
                $totalServices = 0;
            }

            if (Schema::hasTable('blog_posts')) {
                $blogStats = BlogPost::selectRaw('
                    COUNT(*) as total,
                    SUM(CASE WHEN is_published = 1 THEN 1 ELSE 0 END) as published
                ')->first();
                
                $totalBlogPosts = $blogStats->total ?? 0;
                $publishedBlogPosts = $blogStats->published ?? 0;
            } else {
                $totalBlogPosts = 0;
                $publishedBlogPosts = 0;
            }

            if (Schema::hasTable('contacts')) {
                $contactStats = Contact::selectRaw('
                    COUNT(*) as total,
                    SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) as unread
                ')->first();
                
                $totalContacts = $contactStats->total ?? 0;
                $unreadContacts = $contactStats->unread ?? 0;
            } else {
                $totalContacts = 0;
                $unreadContacts = 0;
            }

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
            $totalBlogPosts = 0;
            $publishedBlogPosts = 0;
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
            'totalBlogPosts',
            'publishedBlogPosts',
            'totalContacts',
            'unreadContacts',
            'recentProperties'
        ));
    }
}

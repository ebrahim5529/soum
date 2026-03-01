<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use App\Models\PropertyVideo;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['propertyType', 'serviceType', 'city'])
            ->latest()
            ->paginate(15);

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $serviceTypes = ServiceType::all();
        $cities = City::all();

        return view('admin.properties.create', compact('propertyTypes', 'serviceTypes', 'cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'floors' => 'nullable|integer|min:0',
            'floor_number' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'property_type_id' => 'required|exists:property_types,id',
            'service_type_id' => 'required|exists:service_types,id',
            'city_id' => 'required|exists:cities,id',
            'district' => 'nullable|string|max:255',
            'status' => 'required|in:available,sold,rented',
            'featured_status' => 'nullable|string',
            'google_map_url' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos' => 'nullable|array',
            'videos.*.url' => 'nullable|url',
            'videos.*.file' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200', // 50MB max
            'videos.*.title' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        // رفع الصورة الرئيسية
        if ($request->hasFile('image')) {
            $mainImagePath = $request->file('image')->store('awareness-programs', 'public');
            $validated['image'] = $mainImagePath;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['likes_count'] = 0;

        $property = Property::create($validated);

        // رفع الصور الإضافية
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imagePath = $image->store('awareness-programs', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $imagePath,
                    'order' => $index,
                ]);
            }
        }

        // رفع الفيديوهات
        if ($request->has('videos')) {
            foreach ($request->videos as $index => $videoData) {
                $videoPath = null;
                $title = $videoData['title'] ?? null;

                // إذا كان ملف فيديو محلي
                if (isset($videoData['file']) && $request->hasFile("videos.{$index}.file")) {
                    $videoPath = $request->file("videos.{$index}.file")->store('property-videos', 'public');
                }
                // إذا كان رابط خارجي
                elseif (isset($videoData['url']) && !empty($videoData['url'])) {
                    $videoPath = $videoData['url'];
                }

                if ($videoPath) {
                    PropertyVideo::create([
                        'property_id' => $property->id,
                        'video_path' => $videoPath,
                        'title' => $title,
                        'order' => $index,
                    ]);
                }
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'تم إنشاء العقار بنجاح');
    }

    public function show(Property $property)
    {
        $property->load(['propertyType', 'serviceType', 'city', 'images', 'videos']);

        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $property->load(['images', 'videos']);
        $propertyTypes = PropertyType::all();
        $serviceTypes = ServiceType::all();
        $cities = City::all();

        return view('admin.properties.edit', compact('property', 'propertyTypes', 'serviceTypes', 'cities'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'floors' => 'nullable|integer|min:0',
            'floor_number' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'property_type_id' => 'required|exists:property_types,id',
            'service_type_id' => 'required|exists:service_types,id',
            'city_id' => 'required|exists:cities,id',
            'district' => 'nullable|string|max:255',
            'status' => 'required|in:available,sold,rented',
            'featured_status' => 'nullable|string',
            'google_map_url' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_images' => 'nullable|array',
            'videos' => 'nullable|array',
            'videos.*.url' => 'nullable|url',
            'videos.*.file' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200', // 50MB max
            'videos.*.title' => 'nullable|string|max:255',
            'delete_videos' => 'nullable|array',
            'is_featured' => 'boolean',
        ]);

        // تحديث الصورة الرئيسية
        if ($request->hasFile('image')) {
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
            $mainImagePath = $request->file('image')->store('awareness-programs', 'public');
            $validated['image'] = $mainImagePath;
        }

        $validated['is_featured'] = $request->has('is_featured');

        $property->update($validated);

        // حذف الصور المحددة
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = PropertyImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }
        }

        // رفع صور جديدة
        if ($request->hasFile('images')) {
            $lastOrder = PropertyImage::where('property_id', $property->id)->max('order') ?? -1;
            foreach ($request->file('images') as $index => $image) {
                $imagePath = $image->store('awareness-programs', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $imagePath,
                    'order' => $lastOrder + $index + 1,
                ]);
            }
        }

        // حذف الفيديوهات المحددة
        if ($request->has('delete_videos')) {
            foreach ($request->delete_videos as $videoId) {
                $video = PropertyVideo::find($videoId);
                if ($video) {
                    // حذف الملف إذا كان محلي
                    if (!$video->isExternalUrl()) {
                        Storage::disk('public')->delete($video->video_path);
                    }
                    $video->delete();
                }
            }
        }

        // رفع فيديوهات جديدة
        if ($request->has('videos')) {
            $lastOrder = PropertyVideo::where('property_id', $property->id)->max('order') ?? -1;
            foreach ($request->videos as $index => $videoData) {
                $videoPath = null;
                $title = $videoData['title'] ?? null;

                // إذا كان ملف فيديو محلي
                if (isset($videoData['file']) && $request->hasFile("videos.{$index}.file")) {
                    $videoPath = $request->file("videos.{$index}.file")->store('property-videos', 'public');
                }
                // إذا كان رابط خارجي
                elseif (isset($videoData['url']) && !empty($videoData['url'])) {
                    $videoPath = $videoData['url'];
                }

                if ($videoPath) {
                    PropertyVideo::create([
                        'property_id' => $property->id,
                        'video_path' => $videoPath,
                        'title' => $title,
                        'order' => $lastOrder + $index + 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'تم تحديث العقار بنجاح');
    }

    public function destroy(Property $property)
    {
        // حذف الصور
        if ($property->image) {
            Storage::disk('public')->delete($property->image);
        }

        foreach ($property->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        // حذف الفيديوهات
        foreach ($property->videos as $video) {
            if (!$video->isExternalUrl()) {
                Storage::disk('public')->delete($video->video_path);
            }
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'تم حذف العقار بنجاح');
    }
}

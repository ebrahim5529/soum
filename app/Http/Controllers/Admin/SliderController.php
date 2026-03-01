<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::with('property')
            ->orderBy('order')
            ->latest()
            ->paginate(15);

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        $properties = Property::all();

        return view('admin.sliders.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:255',
            'property_type' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'badge_color' => 'nullable|in:red,green,blue',
            'property_id' => 'nullable|exists:properties,id',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // رفع الصورة
        if ($request->hasFile('background_image')) {
            $imagePath = $request->file('background_image')->store('awareness-programs', 'public');
            $validated['background_image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['likes_count'] = 0;
        $validated['order'] = $validated['order'] ?? Slider::max('order') + 1;

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'تم إنشاء الشريحة بنجاح');
    }

    public function edit(Slider $slider)
    {
        $properties = Property::all();

        return view('admin.sliders.edit', compact('slider', 'properties'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:255',
            'property_type' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'badge_color' => 'nullable|in:red,green,blue',
            'property_id' => 'nullable|exists:properties,id',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // تحديث الصورة
        if ($request->hasFile('background_image')) {
            if ($slider->background_image) {
                Storage::disk('public')->delete($slider->background_image);
            }
            $imagePath = $request->file('background_image')->store('awareness-programs', 'public');
            $validated['background_image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'تم تحديث الشريحة بنجاح');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->background_image) {
            Storage::disk('public')->delete($slider->background_image);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'تم حذف الشريحة بنجاح');
    }
}

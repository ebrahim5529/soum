<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::orderBy('name')->get();
        return view('admin.property-types.index', compact('propertyTypes'));
    }

    public function create()
    {
        return view('admin.property-types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_types,name',
            'name_en' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        PropertyType::create($validated);

        return redirect()->route('admin.property-types.index')
            ->with('success', 'تم إنشاء نوع العقار بنجاح');
    }

    public function edit(PropertyType $propertyType)
    {
        return view('admin.property-types.edit', compact('propertyType'));
    }

    public function update(Request $request, PropertyType $propertyType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_types,name,' . $propertyType->id,
            'name_en' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $propertyType->update($validated);

        return redirect()->route('admin.property-types.index')
            ->with('success', 'تم تحديث نوع العقار بنجاح');
    }

    public function destroy(PropertyType $propertyType)
    {
        // التحقق من وجود عقارات مرتبطة
        if ($propertyType->properties()->count() > 0) {
            return redirect()->route('admin.property-types.index')
                ->with('error', 'لا يمكن حذف نوع العقار لأنه مرتبط بعقارات موجودة');
        }

        $propertyType->delete();

        return redirect()->route('admin.property-types.index')
            ->with('success', 'تم حذف نوع العقار بنجاح');
    }
}


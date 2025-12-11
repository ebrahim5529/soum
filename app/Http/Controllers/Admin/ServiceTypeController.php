<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $serviceTypes = ServiceType::orderBy('name')->get();
        return view('admin.service-types.index', compact('serviceTypes'));
    }

    public function create()
    {
        return view('admin.service-types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:service_types,name',
            'name_en' => 'nullable|string|max:255',
        ]);

        ServiceType::create($validated);

        return redirect()->route('admin.service-types.index')
            ->with('success', 'تم إنشاء نوع الخدمة بنجاح');
    }

    public function edit(ServiceType $serviceType)
    {
        return view('admin.service-types.edit', compact('serviceType'));
    }

    public function update(Request $request, ServiceType $serviceType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:service_types,name,' . $serviceType->id,
            'name_en' => 'nullable|string|max:255',
        ]);

        $serviceType->update($validated);

        return redirect()->route('admin.service-types.index')
            ->with('success', 'تم تحديث نوع الخدمة بنجاح');
    }

    public function destroy(ServiceType $serviceType)
    {
        // التحقق من وجود عقارات مرتبطة
        if ($serviceType->properties()->count() > 0) {
            return redirect()->route('admin.service-types.index')
                ->with('error', 'لا يمكن حذف نوع الخدمة لأنه مرتبط بعقارات موجودة');
        }

        $serviceType->delete();

        return redirect()->route('admin.service-types.index')
            ->with('success', 'تم حذف نوع الخدمة بنجاح');
    }
}


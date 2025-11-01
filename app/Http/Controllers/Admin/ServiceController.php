<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->latest()->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'icon_color' => 'required|in:blue,green,purple,orange,teal,red',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['order'] = $validated['order'] ?? Service::max('order') + 1;

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'تم إنشاء الخدمة بنجاح');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'icon_color' => 'required|in:blue,green,purple,orange,teal,red',
            'order' => 'nullable|integer|min:0',
        ]);

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'تم حذف الخدمة بنجاح');
    }
}

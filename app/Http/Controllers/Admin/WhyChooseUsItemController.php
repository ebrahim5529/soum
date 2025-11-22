<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUsItem;
use Illuminate\Http\Request;

class WhyChooseUsItemController extends Controller
{
    public function index()
    {
        $items = WhyChooseUsItem::orderBy('order')->latest()->paginate(15);

        return view('admin.why-choose-us.index', compact('items'));
    }

    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'icon_color' => 'required|in:primary,blue,green,purple,orange,teal,red',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['order'] = $validated['order'] ?? WhyChooseUsItem::max('order') + 1;

        WhyChooseUsItem::create($validated);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'تم إنشاء العنصر بنجاح');
    }

    public function edit(WhyChooseUsItem $whyChooseUsItem)
    {
        return view('admin.why-choose-us.edit', compact('whyChooseUsItem'));
    }

    public function update(Request $request, WhyChooseUsItem $whyChooseUsItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'icon_color' => 'required|in:primary,blue,green,purple,orange,teal,red',
            'order' => 'nullable|integer|min:0',
        ]);

        $whyChooseUsItem->update($validated);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'تم تحديث العنصر بنجاح');
    }

    public function destroy(WhyChooseUsItem $whyChooseUsItem)
    {
        $whyChooseUsItem->delete();

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'تم حذف العنصر بنجاح');
    }
}

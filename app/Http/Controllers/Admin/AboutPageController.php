<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\WhyChooseUsItem;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::firstOrCreate([]);
        $whyChooseUsItems = WhyChooseUsItem::orderBy('order')->get();

        return view('admin.about.index', compact('aboutPage', 'whyChooseUsItems'));
    }

    public function edit()
    {
        $aboutPage = AboutPage::firstOrCreate([]);
        $whyChooseUsItems = WhyChooseUsItem::orderBy('order')->get();

        return view('admin.about.edit', compact('aboutPage', 'whyChooseUsItems'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'introduction' => 'nullable|string',
            'vision_title' => 'nullable|string|max:255',
            'vision_content' => 'nullable|string',
            'mission_title' => 'nullable|string|max:255',
            'mission_content' => 'nullable|string',
            'team_description' => 'nullable|string',
        ]);

        $aboutPage = AboutPage::firstOrCreate([]);
        $aboutPage->update($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'تم تحديث محتوى "من نحن" بنجاح');
    }
}

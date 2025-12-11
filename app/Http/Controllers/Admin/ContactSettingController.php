<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index()
    {
        $contactSetting = ContactSetting::first();
        
        // إنشاء سجل افتراضي إذا لم يكن موجوداً
        if (!$contactSetting) {
            $contactSetting = ContactSetting::create([
                'address' => 'القصيم - عنيزة - حي الفاخرية - طريق عمربن الخطاب',
                'phone_1' => '0547413177',
                'phone_2' => '0556308601',
                'phone_3' => '0500179969',
                'email' => 'Soum.unizah@gmail.com',
                'working_hours_office' => '4:00 م - 9:00 م',
                'working_hours_online' => '24 ساعة',
            ]);
        }

        return view('admin.contact-settings.index', compact('contactSetting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|string',
            'google_map_embed' => 'nullable|string',
            'phone_1' => 'nullable|string|max:255',
            'phone_2' => 'nullable|string|max:255',
            'phone_3' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'working_hours_office' => 'nullable|string|max:255',
            'working_hours_online' => 'nullable|string|max:255',
        ]);

        $contactSetting = ContactSetting::first();
        
        if ($contactSetting) {
            $contactSetting->update($validated);
        } else {
            ContactSetting::create($validated);
        }

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'تم تحديث إعدادات الاتصال بنجاح');
    }
}


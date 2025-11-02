<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        // Check if request is from modal (AJAX or has referrer)
        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'success' => true,
                'message' => 'شكراً لك! تم إرسال رسالتك بنجاح وسنتواصل معك قريباً.'
            ]);
        }

        return redirect()->back()
            ->with('success', 'شكراً لك! تم إرسال رسالتك بنجاح وسنتواصل معك قريباً.');
    }
}

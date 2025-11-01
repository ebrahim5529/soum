<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // تحديث حالة القراءة
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'تم حذف الرسالة بنجاح');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);

        return redirect()->back()->with('success', 'تم تحديد الرسالة كمقروءة');
    }

    public function markAsUnread(Contact $contact)
    {
        $contact->update(['is_read' => false]);

        return redirect()->back()->with('success', 'تم تحديد الرسالة كغير مقروءة');
    }
}


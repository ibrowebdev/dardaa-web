<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // Search logic
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        // Filter Read/Unread
        if ($request->filled('status')) {
            $status = $request->input('status') === 'read';
            $query->where('is_read', $status);
        }

        $contacts = $query->latest()->paginate(15)->appends($request->query());

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Automatically mark as read when opened
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        return view('admin.contacts.show', compact('contact'));
    }

    public function markRead(Contact $contact)
    {
        $contact->update(['is_read' => !$contact->is_read]);
        
        $status = $contact->is_read ? 'read' : 'unread';
        return back()->with('success', "Contact successfully marked as {$status}.");
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact request deleted successfully.');
    }
}

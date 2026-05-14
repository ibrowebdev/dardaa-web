<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function submit(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        try {
            // Laravel Mail::to() accepts a single parameter (string, array, or collection)
            Mail::to(config('mail.from.address'))->send(new ContactReceived($contact));
            Log::info('Contact form submitted successfully: ' . $contact->id);
        } catch (\Exception $e) {
            Log::error('Failed to send contact email: ' . $e->getMessage());
            report($e);
        }

        return redirect()->route('contact')->with('success', 'Thank you for reaching out! We\'ll get back to you within 24 hours.');
    }
}

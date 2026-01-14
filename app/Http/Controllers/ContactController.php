<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Handle contact form submission
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:5000',
        ]);

        try {
            // Save to database
            $contact = Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'message' => $validated['message'],
                'submitted_at' => now(),
            ]);

            // Optional: Send email notification
            // $this->sendNotificationEmail($contact);

            return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    /**
     * Send email notification (optional)
     */
    private function sendNotificationEmail($contact)
    {
        $adminEmail = 'customerservice@mehalintl.com';

        Mail::send('emails.contact', ['contact' => $contact], function ($message) use ($adminEmail, $contact) {
            $message->to($adminEmail)
                ->subject('New Contact Form Submission from ' . $contact->name);
        });
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Testimonial;

class PageController extends Controller
{
    public function gallery()
    {
        $galleries = Gallery::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('gallery', compact('galleries'));
    }

    public function about()
    {
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();
        
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('about', compact('teamMembers', 'services'));
    }

    public function team()
    {
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        return view('team', compact('teamMembers'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->limit(6)
            ->get();
        
        return view('services', compact('services', 'testimonials'));
    }

    public function contact()
    {
        $contacts = Contact::where('is_read', true)
            ->latest()
            ->limit(6)
            ->get();
            
        return view('contact', compact('contacts'));
    }

    public function contactStore(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}

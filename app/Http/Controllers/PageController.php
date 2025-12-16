<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\TeamMember;
use App\Models\Service;

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
        
        return view('services', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(\Illuminate\Http\Request $request)
    {
        // In a real app, you would send email or save to database
        // For now, just return success
        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}

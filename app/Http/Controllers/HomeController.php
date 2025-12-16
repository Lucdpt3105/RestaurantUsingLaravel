<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredMenus = Menu::where('is_featured', true)
            ->with('category')
            ->orderBy('sort_order')
            ->limit(6)
            ->get();
        
        $categories = Category::orderBy('sort_order')->get();
        
        $galleryImages = Gallery::where('is_active', true)
            ->orderBy('sort_order')
            ->limit(8)
            ->get();
        
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        return view('home', compact('featuredMenus', 'categories', 'galleryImages', 'testimonials'));
    }
}

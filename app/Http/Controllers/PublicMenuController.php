<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicMenuController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        $menus = Menu::with('category')
            ->orderBy('sort_order')
            ->get();
        
        return view('menu', compact('categories', 'menus'));
    }
}

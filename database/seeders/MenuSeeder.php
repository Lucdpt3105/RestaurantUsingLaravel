<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $coffee = Category::where('name', 'Coffee')->first();
        $food = Category::where('name', 'Food')->first();
        $desserts = Category::where('name', 'Desserts')->first();
        $drinks = Category::where('name', 'Drinks')->first();

        $menus = [
            // Coffee
            [
                'category_id' => $coffee->id,
                'name' => 'Espresso',
                'description' => 'Rich and bold Italian espresso made from premium arabica beans',
                'price' => 35000,
                'image_url' => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $coffee->id,
                'name' => 'Cappuccino',
                'description' => 'Creamy espresso with steamed milk and foam',
                'price' => 45000,
                'image_url' => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'category_id' => $coffee->id,
                'name' => 'Latte',
                'description' => 'Smooth espresso with plenty of steamed milk',
                'price' => 45000,
                'image_url' => 'https://images.unsplash.com/photo-1561882468-9110e03e0f78?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 3,
            ],
            
            // Food
            [
                'category_id' => $food->id,
                'name' => 'Grilled Steak',
                'description' => 'Premium beef steak grilled to perfection with special sauce',
                'price' => 185000,
                'image_url' => 'https://images.unsplash.com/photo-1546964124-0cce460f38ef?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Pasta Carbonara',
                'description' => 'Classic Italian pasta with creamy sauce and bacon',
                'price' => 95000,
                'image_url' => 'https://images.unsplash.com/photo-1612874742237-6526221588e3?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            
            // Desserts
            [
                'category_id' => $desserts->id,
                'name' => 'Tiramisu',
                'description' => 'Italian coffee-flavored dessert with mascarpone',
                'price' => 55000,
                'image_url' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            
            // Drinks
            [
                'category_id' => $drinks->id,
                'name' => 'Fresh Orange Juice',
                'description' => 'Freshly squeezed orange juice',
                'price' => 38000,
                'image_url' => 'https://images.unsplash.com/photo-1600271886742-f049cd451bba?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 1,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}

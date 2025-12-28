<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Tắt foreign key checks tạm thời để xóa dữ liệu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Menu::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
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
            [
                'category_id' => $coffee->id,
                'name' => 'Americano',
                'description' => 'Espresso diluted with hot water for a lighter taste',
                'price' => 40000,
                'image_url' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'category_id' => $coffee->id,
                'name' => 'Mocha',
                'description' => 'Espresso with chocolate and steamed milk',
                'price' => 50000,
                'image_url' => 'https://images.unsplash.com/photo-1607434472257-d9f8e57a643d?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'category_id' => $coffee->id,
                'name' => 'Vietnamese Coffee',
                'description' => 'Traditional Vietnamese coffee with condensed milk',
                'price' => 38000,
                'image_url' => 'https://images.unsplash.com/photo-1599639957043-f3aa5c986398?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'category_id' => $coffee->id,
                'name' => 'Iced Caramel Macchiato',
                'description' => 'Iced espresso with vanilla, milk and caramel drizzle',
                'price' => 52000,
                'image_url' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 7,
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
            [
                'category_id' => $food->id,
                'name' => 'Salmon Teriyaki',
                'description' => 'Grilled salmon with teriyaki glaze and steamed vegetables',
                'price' => 165000,
                'image_url' => 'https://images.unsplash.com/photo-1580959375944-87325fe04f8a?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Chicken Parmesan',
                'description' => 'Breaded chicken breast with marinara sauce and melted cheese',
                'price' => 125000,
                'image_url' => 'https://images.unsplash.com/photo-1632778149955-e80f8ceca2e8?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Beef Burger',
                'description' => 'Juicy beef patty with cheese, lettuce, tomato and special sauce',
                'price' => 85000,
                'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Caesar Salad',
                'description' => 'Fresh romaine lettuce with Caesar dressing, croutons and parmesan',
                'price' => 68000,
                'image_url' => 'https://images.unsplash.com/photo-1546793665-c74683f339c1?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Margherita Pizza',
                'description' => 'Classic Italian pizza with tomato, mozzarella and fresh basil',
                'price' => 115000,
                'image_url' => 'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Seafood Paella',
                'description' => 'Spanish rice dish with shrimp, mussels, and calamari',
                'price' => 145000,
                'image_url' => 'https://images.unsplash.com/photo-1534080564583-6be75777b70a?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Vietnamese Pho',
                'description' => 'Traditional Vietnamese beef noodle soup with herbs',
                'price' => 75000,
                'image_url' => 'https://images.unsplash.com/photo-1591814468924-caf88d1232e1?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 9,
            ],
            [
                'category_id' => $food->id,
                'name' => 'Pad Thai',
                'description' => 'Thai stir-fried noodles with shrimp, peanuts and lime',
                'price' => 85000,
                'image_url' => 'https://images.unsplash.com/photo-1559314809-0d155014e29e?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 10,
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
            [
                'category_id' => $desserts->id,
                'name' => 'Chocolate Lava Cake',
                'description' => 'Warm chocolate cake with molten chocolate center',
                'price' => 62000,
                'image_url' => 'https://images.unsplash.com/photo-1624353365286-3f8d62daad51?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'category_id' => $desserts->id,
                'name' => 'Cheesecake',
                'description' => 'Creamy New York style cheesecake with berry compote',
                'price' => 58000,
                'image_url' => 'https://i.pinimg.com/1200x/55/c5/c8/55c5c84f8bbacb8697cfff54cec1c20c.jpg',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'category_id' => $desserts->id,
                'name' => 'Panna Cotta',
                'description' => 'Italian cream dessert with vanilla and fruit sauce',
                'price' => 48000,
                'image_url' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'category_id' => $desserts->id,
                'name' => 'Crème Brûlée',
                'description' => 'French custard dessert with caramelized sugar top',
                'price' => 52000,
                'image_url' => 'https://images.unsplash.com/photo-1470124182917-cc6e71b22ecc?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'category_id' => $desserts->id,
                'name' => 'Ice Cream Sundae',
                'description' => 'Three scoops of ice cream with toppings and whipped cream',
                'price' => 45000,
                'image_url' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 6,
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
            [
                'category_id' => $drinks->id,
                'name' => 'Strawberry Smoothie',
                'description' => 'Fresh strawberries blended with yogurt and honey',
                'price' => 42000,
                'image_url' => 'https://images.unsplash.com/photo-1505252585461-04db1eb84625?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'category_id' => $drinks->id,
                'name' => 'Mango Lassi',
                'description' => 'Indian yogurt drink with fresh mango',
                'price' => 45000,
                'image_url' => 'https://images.unsplash.com/photo-1625772452859-1c03d5bf1137?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 3,
            ],
            [
                'category_id' => $drinks->id,
                'name' => 'Green Tea Lemonade',
                'description' => 'Refreshing blend of green tea and fresh lemon',
                'price' => 35000,
                'image_url' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=400',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'category_id' => $drinks->id,
                'name' => 'Iced Matcha Latte',
                'description' => 'Japanese green tea powder with cold milk',
                'price' => 48000,
                'image_url' => 'https://images.unsplash.com/photo-1536013266149-81d0b4a75e8d?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'category_id' => $drinks->id,
                'name' => 'Coconut Water',
                'description' => 'Fresh young coconut water served chilled',
                'price' => 32000,
                'image_url' => 'https://i.pinimg.com/736x/a0/d1/e5/a0d1e5b61f0d39bff1d81ec809522c5b.jpg',
                'is_available' => true,
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'category_id' => $drinks->id,
                'name' => 'Passion Fruit Mojito',
                'description' => 'Non-alcoholic mojito with passion fruit and mint',
                'price' => 46000,
                'image_url' => 'https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=400',
                'is_available' => true,
                'is_featured' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Coffee',
                'slug' => 'coffee',
                'icon' => '☕',
                'description' => 'Premium coffee from around the world',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Food',
                'slug' => 'food',
                'icon' => '🍽️',
                'description' => 'Delicious dishes prepared by our expert chefs',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Desserts',
                'slug' => 'desserts',
                'icon' => '🍰',
                'description' => 'Sweet treats and desserts',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Drinks',
                'slug' => 'drinks',
                'icon' => '🥤',
                'description' => 'Refreshing beverages and cocktails',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

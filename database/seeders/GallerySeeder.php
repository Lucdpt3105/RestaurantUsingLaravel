<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'title' => 'Interior Design',
                'description' => 'Modern and cozy restaurant interior',
                'image_url' => '/images/gallery/1.jpg',
                'category' => 'interior',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Coffee Art',
                'description' => 'Beautiful latte art by our baristas',
                'image_url' => '/images/gallery/2.jpg',
                'category' => 'food',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Dining Area',
                'description' => 'Comfortable seating for groups',
                'image_url' => '/images/gallery/3.jpg',
                'category' => 'interior',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Restaurant Ambiance',
                'description' => 'Perfect atmosphere for dining',
                'image_url' => '/images/gallery/4.jpg',
                'category' => 'interior',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Gourmet Dishes',
                'description' => 'Expertly prepared meals',
                'image_url' => '/images/gallery/5.jpg',
                'category' => 'food',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Coffee Selection',
                'description' => 'Premium coffee beans',
                'image_url' => '/images/gallery/6.jpg',
                'category' => 'food',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'Fresh Ingredients',
                'description' => 'Using only the finest ingredients',
                'image_url' => '/images/gallery/7.jpg',
                'category' => 'food',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Dessert Selection',
                'description' => 'Delicious desserts and pastries',
                'image_url' => '/images/gallery/8.jpg',
                'category' => 'food',
                'is_active' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($images as $image) {
            Gallery::create($image);
        }
    }
}

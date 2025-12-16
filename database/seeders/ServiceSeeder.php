<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Dine-In',
                'slug' => 'dine-in',
                'description' => 'Enjoy our cozy ambiance and exceptional service in our beautifully designed dining area.',
                'image_url' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Takeaway',
                'slug' => 'takeaway',
                'description' => 'Order your favorite dishes to go. Fast, convenient, and delicious meals ready when you are.',
                'image_url' => 'https://images.unsplash.com/photo-1526367790999-0150786686a2?w=800',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Catering',
                'slug' => 'catering',
                'description' => 'Professional catering services for your special events, parties, and corporate gatherings.',
                'image_url' => 'https://images.unsplash.com/photo-1555244162-803834f70033?w=800',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Private Events',
                'slug' => 'private-events',
                'description' => 'Host your private events in our exclusive dining spaces with customized menus.',
                'image_url' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=800',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

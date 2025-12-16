<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'position' => 'Food Critic',
                'avatar' => 'https://i.pravatar.cc/150?img=1',
                'content' => 'Amazing food and excellent service! The ambiance is perfect for a romantic dinner. I especially loved the grilled steak - cooked to perfection!',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Coffee Enthusiast',
                'avatar' => 'https://i.pravatar.cc/150?img=12',
                'content' => 'Best coffee in town! I come here every morning for their cappuccino. The baristas really know their craft and the atmosphere is incredibly welcoming.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Emily Davis',
                'position' => 'Regular Customer',
                'avatar' => 'https://i.pravatar.cc/150?img=5',
                'content' => 'Love the cozy atmosphere and the staff is always friendly. The menu has a great variety and everything I\'ve tried has been delicious. Highly recommended!',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'David Martinez',
                'position' => 'Business Owner',
                'avatar' => 'https://i.pravatar.cc/150?img=14',
                'content' => 'Perfect place for business lunches. The service is prompt, food is excellent, and the environment is professional yet comfortable.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Lisa Anderson',
                'position' => 'Food Blogger',
                'avatar' => 'https://i.pravatar.cc/150?img=9',
                'content' => 'The presentation of each dish is Instagram-worthy! But more importantly, the taste matches the beautiful plating. Their pasta carbonara is the best I\'ve had.',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'James Wilson',
                'position' => 'Chef',
                'avatar' => 'https://i.pravatar.cc/150?img=33',
                'content' => 'As a chef myself, I can truly appreciate the quality and technique that goes into each dish here. The attention to detail is impressive!',
                'rating' => 5,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}

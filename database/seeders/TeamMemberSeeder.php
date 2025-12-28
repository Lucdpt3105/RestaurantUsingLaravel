<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa dữ liệu cũ
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TeamMember::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $team = [
            // === Leadership ===
            [
                'name' => 'Phùng Anh Lực',
                'position' => 'Founder & CEO',
                'bio' => 'Ông trùm sáng lập và điều hành nhà hàng với tầm nhìn chiến lược và đam mê ẩm thực.',
                'photo' => '/images/team/4.jpg',
                'facebook' => 'https://www.facebook.com/anhluc.phung.7/',
                'instagram' => 'https://www.instagram.com/anhlucphung/',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Sophia Laurent',
                'position' => 'Restaurant Manager',
                'bio' => 'Leads the restaurant with professionalism and attention to detail.',
                'photo' => 'https://i.pinimg.com/736x/6d/52/0a/6d520a6d102fd5aaafb6effd2821d006.jpg',
                'instagram' => 'https://instagram.com/',
                'is_active' => true,
                'sort_order' => 2,
            ],
            
            // === Kitchen Team ===
            [
                'name' => 'Alessandro Romano',
                'position' => 'Executive Chef',
                'bio' => 'With over 15 years of culinary experience, Chef Alessandro brings authentic Italian flavors to every dish.',
                'photo' => 'https://i.pinimg.com/1200x/cd/8f/1b/cd8f1be17729b9eb27cf44feea03f716.jpg',
                'facebook' => 'https://facebook.com/alessandroromano',
                'instagram' => 'https://instagram.com/chefalessandro',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Emma Collins',
                'position' => 'Sous Chef',
                'bio' => 'Supports kitchen operations and maintains quality standards.',
                'photo' => 'https://i.pinimg.com/1200x/6d/f2/d3/6df2d3927e4a04d59456b62a5f0bb0b6.jpg',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Mia Nguyen',
                'position' => 'Pastry Chef',
                'bio' => 'Award-winning pastry chef specializing in French desserts and artistic cake designs.',
                'photo' => 'https://i.pinimg.com/736x/1a/91/d5/1a91d526d28921df957eaff1316ffaa8.jpg',
                'instagram' => 'https://instagram.com/mariapastries',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Gordon Ramsey',
                'position' => 'Line Cook',
                'bio' => 'Ensures consistency and presentation in every dish.',
                'photo' => 'https://i.pinimg.com/1200x/84/7e/7a/847e7a52d5671dfa79ab30a34104671f.jpg',
                'is_active' => true,
                'sort_order' => 6,
            ],

            // === Beverage Team ===
            [
                'name' => 'Robert Chen',
                'position' => 'Head Barista',
                'bio' => 'Coffee expert with certifications from multiple international coffee academies.',
                'photo' => '/images/team/3.jpg',
                'twitter' => 'https://twitter.com/robertcoffee',
                'instagram' => 'https://instagram.com/robertcoffee',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Chloe Kim',
                'position' => 'Barista',
                'bio' => 'Delivers warm service and perfectly brewed coffee.',
                'photo' => 'https://i.pinimg.com/736x/db/a9/bd/dba9bd35d8116f748b119bbfb52229e4.jpg',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Ava Martinez',
                'position' => 'Bartender',
                'bio' => 'Creates signature cocktails with style.',
                'photo' => 'https://i.pinimg.com/1200x/d8/c5/44/d8c544cd009d8b461bdf6aee3072520b.jpg',
                'is_active' => true,
                'sort_order' => 9,
            ],

            // === Service Team ===
            [
                'name' => 'Emily Brown',
                'position' => 'Head Waitress',
                'bio' => 'Leads service team with professionalism.',
                'photo' => 'https://cdn2.fptshop.com.vn/unsafe/800x0/pexels_vo_van_ti_n_2037497312_29550833_882f7b1d66.jpg',
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'name' => 'Lisa Wilson',
                'position' => 'Waitress',
                'bio' => 'Friendly and attentive to guests.',
                'photo' => 'https://i.pinimg.com/736x/02/60/79/026079b186896c87fa6a591576882c69.jpg',
                'is_active' => true,
                'sort_order' => 11,
            ],
            [
                'name' => 'Jisoo Kim',
                'position' => 'Waitress',
                'bio' => 'Ensures guests feel welcome and comfortable.',
                'photo' => 'https://i.pinimg.com/736x/b0/75/1d/b0751d4c1a865dbb5448eec8642fa960.jpg',
                'is_active' => true,
                'sort_order' => 12,
            ],
            [
                'name' => 'Natalie Vo',
                'position' => 'Waitress',
                'bio' => 'Passionate about customer satisfaction.',
                'photo' => 'https://i.pinimg.com/736x/ab/dd/7f/abdd7fa7ef6ac179e85efcd1eab81238.jpg',
                'is_active' => true,
                'sort_order' => 13,
            ],

            // === Front Desk & Support ===
            [
                'name' => 'Julia Anderson',
                'position' => 'Receptionist',
                'bio' => 'Handles reservations and guest reception.',
                'photo' => 'https://i.pinimg.com/736x/22/9e/08/229e0822bf976d2f98d44e2aeb188d03.jpg',
                'is_active' => true,
                'sort_order' => 14,
            ],
            [
                'name' => 'Sakura Mori',
                'position' => 'Cashier',
                'bio' => 'Manages payments efficiently with a smile.',
                'photo' => 'https://i.pinimg.com/1200x/67/81/0f/67810f6d47fc551f15d5a35f11a1eaaf.jpg',
                'is_active' => true,
                'sort_order' => 15,
            ],
            [
                'name' => 'Yuki Tanaka',
                'position' => 'Customer Service',
                'bio' => 'Supports guests with care and professionalism.',
                'photo' => 'https://i.pinimg.com/736x/1b/f7/49/1bf7494ae0992cd651c5fe49409532de.jpg',
                'is_active' => true,
                'sort_order' => 16,
            ],
            
            // === Marketing & PR ===
            [
                'name' => 'Minji Park',
                'position' => 'PR & Marketing',
                'bio' => 'Manages social media and brand image.',
                'photo' => 'https://i.pinimg.com/1200x/5f/8b/3c/5f8b3c3b372c603462a4a339b30d54e9.jpg',
                'instagram' => 'https://instagram.com/',
                'is_active' => true,
                'sort_order' => 17,
            ],
            [
                'name' => 'Thao Nguyen',
                'position' => 'Content Creator',
                'bio' => 'Creates engaging content for the restaurant.',
                'photo' => 'https://i.pinimg.com/736x/4a/42/d5/4a42d5f99e9c01408bcd53350546fc2f.jpg',
                'instagram' => 'https://instagram.com/',
                'is_active' => true,
                'sort_order' => 18,
            ],
            [
                'name' => 'Elena Petrova',
                'position' => 'Event Coordinator',
                'bio' => 'Organizes special events and promotions.',
                'photo' => 'https://i.pinimg.com/1200x/e5/38/08/e53808d563550fbf1cf9a46410decfa9.jpg',
                'is_active' => true,
                'sort_order' => 19,
            ],
            
            // === HR & Admin ===
            [
                'name' => 'Camila Torres',
                'position' => 'HR Executive',
                'bio' => 'Manages recruitment and staff welfare.',
                'photo' => 'https://i.pinimg.com/736x/d9/7b/f1/d97bf11d26a13b65e87c6f4d3a716aac.jpg',
                'is_active' => true,
                'sort_order' => 20,
            ],
            [
                'name' => 'Bella Rose',
                'position' => 'Brand Ambassador',
                'bio' => 'Represents the restaurant image and values.',
                'photo' => 'https://i.pinimg.com/1200x/40/ae/c7/40aec7d3ddc6dc34cb94fb1cd1633692.jpg',
                'instagram' => 'https://instagram.com/',
                'is_active' => true,
                'sort_order' => 21,
            ],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $team = [
            [
                'name' => 'Alessandro Romano',
                'position' => 'Executive Chef',
                'bio' => 'With over 15 years of culinary experience, Chef Alessandro brings authentic Italian flavors to every dish.',
                'photo' => '/images/team/1.jpg',
                'facebook' => 'https://facebook.com/alessandroromano',
                'instagram' => 'https://instagram.com/chefalessandro',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Maria Santos',
                'position' => 'Pastry Chef',
                'bio' => 'Award-winning pastry chef specializing in French desserts and artistic cake designs.',
                'photo' => '/images/team/2.jpg',
                'instagram' => 'https://instagram.com/mariapastries',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Robert Chen',
                'position' => 'Head Barista',
                'bio' => 'Coffee expert with certifications from multiple international coffee academies.',
                'photo' => '/images/team/3.jpg',
                'twitter' => 'https://twitter.com/robertcoffee',
                'instagram' => 'https://instagram.com/robertcoffee',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Sophie Laurent',
                'position' => 'Restaurant Manager',
                'bio' => 'Passionate about delivering exceptional dining experiences with attention to every detail.',
                'photo' => '/images/team/4.jpg',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }
    }
}

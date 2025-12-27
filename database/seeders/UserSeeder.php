<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@santuy.com',
            'phone' => '+84 123 456 789',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create test users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+84 987 654 321',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '+84 912 345 678',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Michael Brown',
            'email' => 'michael@example.com',
            'phone' => '+84 945 678 901',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}

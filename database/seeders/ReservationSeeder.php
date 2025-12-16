<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $reservations = [
            [
                'name' => 'John Smith',
                'email' => 'john@example.com',
                'phone' => '+1 555-0101',
                'date' => Carbon::now()->addDays(2),
                'time' => '19:00:00',
                'guests' => 4,
                'special_requests' => 'Window table if available',
                'status' => 'confirmed',
            ],
            [
                'name' => 'Anna Johnson',
                'email' => 'anna@example.com',
                'phone' => '+1 555-0102',
                'date' => Carbon::now()->addDays(3),
                'time' => '20:00:00',
                'guests' => 2,
                'special_requests' => 'Anniversary celebration',
                'status' => 'confirmed',
            ],
            [
                'name' => 'Robert Brown',
                'email' => 'robert@example.com',
                'phone' => '+1 555-0103',
                'date' => Carbon::now()->addDays(1),
                'time' => '18:30:00',
                'guests' => 6,
                'special_requests' => 'Business dinner',
                'status' => 'pending',
            ],
            [
                'name' => 'Emma Wilson',
                'email' => 'emma@example.com',
                'phone' => '+1 555-0104',
                'date' => Carbon::now()->subDays(2),
                'time' => '19:30:00',
                'guests' => 3,
                'special_requests' => null,
                'status' => 'completed',
            ],
            [
                'name' => 'Michael Davis',
                'email' => 'michael@example.com',
                'phone' => '+1 555-0105',
                'date' => Carbon::now()->subDays(1),
                'time' => '20:30:00',
                'guests' => 2,
                'special_requests' => 'Vegetarian options needed',
                'status' => 'cancelled',
            ],
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}

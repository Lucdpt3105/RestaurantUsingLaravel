<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $reservations = Reservation::where('email', $user->email)
            ->orderBy('date', 'desc')
            ->paginate(10);
        
        $stats = [
            'total_reservations' => Reservation::where('email', $user->email)->count(),
            'upcoming' => Reservation::where('email', $user->email)
                ->where('date', '>=', now())
                ->where('status', '!=', 'cancelled')
                ->count(),
            'completed' => Reservation::where('email', $user->email)
                ->where('status', 'completed')
                ->count(),
        ];

        return view('user.dashboard', compact('reservations', 'stats'));
    }
}

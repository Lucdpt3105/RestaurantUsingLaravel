<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get reservations
        $reservations = Reservation::where('email', $user->email)
            ->orderBy('date', 'desc')
            ->paginate(5);
        
        // Get orders
        $orders = Order::where('user_id', $user->id)
            ->orWhere('customer_email', $user->email)
            ->with('items')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        
        $stats = [
            'total_reservations' => Reservation::where('email', $user->email)->count(),
            'upcoming' => Reservation::where('email', $user->email)
                ->where('date', '>=', now())
                ->where('status', '!=', 'cancelled')
                ->count(),
            'completed' => Reservation::where('email', $user->email)
                ->where('status', 'completed')
                ->count(),
            'total_orders' => Order::where('user_id', $user->id)
                ->orWhere('customer_email', $user->email)
                ->count(),
            'pending_orders' => Order::where(function($query) use ($user) {
                    $query->where('user_id', $user->id)
                          ->orWhere('customer_email', $user->email);
                })
                ->where('order_status', 'pending')
                ->count(),
            'total_spent' => Order::where(function($query) use ($user) {
                    $query->where('user_id', $user->id)
                          ->orWhere('customer_email', $user->email);
                })
                ->where('payment_status', 'paid')
                ->sum('total'),
        ];

        return view('user.dashboard', compact('reservations', 'orders', 'stats'));
    }
    
    public function showOrder($orderNumber)
    {
        $user = auth()->user();
        
        $order = Order::where('order_number', $orderNumber)
            ->where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhere('customer_email', $user->email);
            })
            ->with('items')
            ->firstOrFail();
            
        return view('user.order-detail', compact('order'));
    }
}

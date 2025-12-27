@extends('layouts.frontend')

@section('title', 'My Dashboard - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px;">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-4xl font-bold" style="font-family: 'Cormorant', serif; color: var(--primary-color);">Welcome, {{ auth()->user()->name }}!</h1>
            <p class="text-gray-600 mt-2">Manage your reservations and profile</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Reservations</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_reservations'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Upcoming</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['upcoming'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Orders</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total_orders'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-amber-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Spent</p>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($stats['total_spent'], 0, ',', '.') }} đ</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mb-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <button onclick="switchTab('orders')" id="tab-orders" class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        My Orders
                    </button>
                    <button onclick="switchTab('reservations')" id="tab-reservations" class="tab-button border-primary-color text-primary-color whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        My Reservations
                    </button>
                </nav>
            </div>
        </div>

        <!-- Orders Section -->
        <div id="orders-section" class="tab-content hidden">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Order History</h2>
                </div>

                @if($orders->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No orders yet</h3>
                        <p class="mt-1 text-sm text-gray-500">Start ordering from our delicious menu.</p>
                        <div class="mt-6">
                            <a href="{{ route('menu') }}" class="btn-primary px-6 py-2 rounded-lg">
                                Browse Menu
                            </a>
                        </div>
                    </div>
                @else
                    <div class="divide-y divide-gray-200">
                        @foreach($orders as $order)
                        <div class="p-6 hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Order #{{ $order->order_number }}</h3>
                                    <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y - h:i A') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-primary-color">{{ number_format($order->total, 0, ',', '.') }} đ</p>
                                    <div class="mt-1">
                                        @if($order->order_status === 'pending')
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        @elseif($order->order_status === 'processing')
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Processing</span>
                                        @elseif($order->order_status === 'completed')
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-2"><strong>Items:</strong></p>
                                <div class="space-y-2">
                                    @foreach($order->items as $item)
                                        <div class="flex justify-between text-sm">
                                            <span class="text-gray-700">{{ $item->menu_name }} × {{ $item->quantity }}</span>
                                            <span class="text-gray-900">{{ number_format($item->subtotal, 0, ',', '.') }} đ</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div class="text-sm">
                                    <span class="text-gray-600">Payment: </span>
                                    <span class="font-medium">
                                        @if($order->payment_method === 'cash')
                                            Cash on Delivery
                                        @elseif($order->payment_method === 'card')
                                            Card
                                        @else
                                            Bank Transfer
                                        @endif
                                    </span>
                                    @if($order->payment_status === 'paid')
                                        <span class="ml-2 text-green-600">✓ Paid</span>
                                    @else
                                        <span class="ml-2 text-yellow-600">Pending</span>
                                    @endif
                                </div>
                                <a href="{{ route('user.order.detail', $order->order_number) }}" class="text-primary-color hover:underline text-sm font-medium">
                                    View Details →
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="px-6 py-4 bg-gray-50">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Reservations Section -->
        <div id="reservations-section" class="tab-content">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">My Reservations</h2>
            </div>

            @if($reservations->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No reservations</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by making a new reservation.</p>
                    <div class="mt-6">
                        <a href="{{ route('reservation') }}" class="btn-primary px-6 py-2 rounded-lg">
                            Make Reservation
                        </a>
                    </div>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date & Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Guests</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Special Requests</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reservations as $reservation)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($reservation->date)->format('M d, Y') }}</div>
                                    <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($reservation->time)->format('h:i A') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $reservation->guests }} {{ $reservation->guests > 1 ? 'guests' : 'guest' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($reservation->status === 'pending')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                    @elseif($reservation->status === 'confirmed')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                    @elseif($reservation->status === 'completed')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Completed</span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $reservation->special_requests ?: '-' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50">
                    {{ $reservations->links() }}
                </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('reservation') }}" class="block bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-amber-100 rounded-full p-3">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">New Reservation</h3>
                        <p class="text-gray-600">Book a table for your next visit</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('menu') }}" class="block bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 rounded-full p-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">View Menu</h3>
                        <p class="text-gray-600">Explore our delicious offerings</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function switchTab(tab) {
        // Hide all tab content
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active state from all tabs
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('border-primary-color', 'text-primary-color');
            button.classList.add('border-transparent', 'text-gray-500');
        });
        
        // Show selected tab content
        document.getElementById(tab + '-section').classList.remove('hidden');
        
        // Add active state to selected tab
        document.getElementById('tab-' + tab).classList.remove('border-transparent', 'text-gray-500');
        document.getElementById('tab-' + tab).classList.add('border-primary-color', 'text-primary-color');
    }
    
    // Initialize - show orders tab by default
    document.addEventListener('DOMContentLoaded', function() {
        switchTab('orders');
    });
</script>
@endpush

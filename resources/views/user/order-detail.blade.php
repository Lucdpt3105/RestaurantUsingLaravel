@extends('layouts.frontend')

@section('title', 'Order Details - Santuy Restaurant')

@section('content')
<section class="py-20" style="margin-top: 120px; background-color: var(--cream-color);">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('user.dashboard') }}" class="text-primary-color hover:underline">
                <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Order Header -->
            <div class="border-b pb-6 mb-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold mb-2" style="font-family: 'Cormorant', serif;">
                            Order #{{ $order->order_number }}
                        </h1>
                        <p class="text-gray-600">Placed on {{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                    <div class="text-right">
                        @if($order->order_status === 'pending')
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>Pending
                            </span>
                        @elseif($order->order_status === 'processing')
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-spinner mr-1"></i>Processing
                            </span>
                        @elseif($order->order_status === 'completed')
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>Completed
                            </span>
                        @else
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-1"></i>Cancelled
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-bold mb-4" style="font-family: 'Cormorant', serif;">
                        <i class="fas fa-user mr-2 text-primary-color"></i>Customer Information
                    </h3>
                    <div class="space-y-2 text-gray-700">
                        <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                        <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                        <p><strong>Address:</strong><br>{{ $order->customer_address }}</p>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-bold mb-4" style="font-family: 'Cormorant', serif;">
                        <i class="fas fa-credit-card mr-2 text-primary-color"></i>Payment Information
                    </h3>
                    <div class="space-y-2 text-gray-700">
                        <p>
                            <strong>Method:</strong> 
                            @if($order->payment_method === 'cash')
                                Cash on Delivery
                            @elseif($order->payment_method === 'card')
                                Card Payment
                            @else
                                Bank Transfer
                            @endif
                        </p>
                        <p>
                            <strong>Status:</strong>
                            @if($order->payment_status === 'paid')
                                <span class="text-green-600 font-semibold">
                                    <i class="fas fa-check-circle mr-1"></i>Paid
                                </span>
                            @elseif($order->payment_status === 'pending')
                                <span class="text-yellow-600 font-semibold">
                                    <i class="fas fa-clock mr-1"></i>Pending
                                </span>
                            @else
                                <span class="text-red-600 font-semibold">
                                    <i class="fas fa-times-circle mr-1"></i>Failed
                                </span>
                            @endif
                        </p>
                        <p><strong>Total:</strong> <span class="text-2xl text-primary-color font-bold">{{ number_format($order->total, 0, ',', '.') }} đ</span></p>
                    </div>
                </div>
            </div>

            @if($order->notes)
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
                <p class="text-sm font-semibold text-yellow-800 mb-1">Special Notes:</p>
                <p class="text-gray-700">{{ $order->notes }}</p>
            </div>
            @endif

            <!-- Order Items -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold mb-4" style="font-family: 'Cormorant', serif;">
                    <i class="fas fa-utensils mr-2 text-primary-color"></i>Order Items
                </h3>
                <div class="border rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($order->items as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->menu_name }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ number_format($item->menu_price, 0, ',', '.') }} đ
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    × {{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 text-right font-semibold">
                                    {{ number_format($item->subtotal, 0, ',', '.') }} đ
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="border-t pt-6">
                <div class="max-w-md ml-auto">
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal:</span>
                            <span>{{ number_format($order->subtotal, 0, ',', '.') }} đ</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Tax (10%):</span>
                            <span>{{ number_format($order->tax, 0, ',', '.') }} đ</span>
                        </div>
                        <div class="flex justify-between text-2xl font-bold border-t pt-2">
                            <span>Total:</span>
                            <span class="text-primary-color">{{ number_format($order->total, 0, ',', '.') }} đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8 pt-6 border-t">
                <a href="{{ route('menu') }}" class="btn-primary rounded-lg px-8 py-3 text-center">
                    <i class="fas fa-shopping-bag mr-2"></i>Order Again
                </a>
                <a href="{{ route('user.dashboard') }}" class="px-8 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-center">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Order Timeline -->
        <div class="bg-white rounded-lg shadow-lg p-8 mt-6">
            <h3 class="text-2xl font-bold mb-6" style="font-family: 'Cormorant', serif;">
                <i class="fas fa-history mr-2 text-primary-color"></i>Order Timeline
            </h3>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="font-semibold text-gray-900">Order Placed</p>
                        <p class="text-sm text-gray-600">{{ $order->created_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
                
                @if($order->order_status !== 'pending')
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-spinner text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="font-semibold text-gray-900">Order Processing</p>
                        <p class="text-sm text-gray-600">Your order is being prepared</p>
                    </div>
                </div>
                @endif
                
                @if($order->order_status === 'completed')
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="font-semibold text-gray-900">Order Completed</p>
                        <p class="text-sm text-gray-600">{{ $order->updated_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
                @endif
                
                @if($order->order_status === 'cancelled')
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-times text-red-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="font-semibold text-gray-900">Order Cancelled</p>
                        <p class="text-sm text-gray-600">{{ $order->updated_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

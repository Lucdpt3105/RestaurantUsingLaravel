@extends('layouts.frontend')

@section('title', 'Thanh toán - Santuy Restaurant')

@section('content')
<div class="pt-32 pb-16 min-h-screen" style="background: var(--cream-color);">
    <div class="container mx-auto px-4 max-w-6xl">
        <h1 class="section-title text-center mb-12">Thanh toán đơn hàng</h1>
        
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif
        
        <form action="{{ route('order.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @csrf
            
            <!-- Customer Information -->
            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-2xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Thông tin khách hàng</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Họ tên *</label>
                            <input type="text" name="customer_name" required 
                                value="{{ auth()->check() ? auth()->user()->name : old('customer_name') }}"
                                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary-color">
                            @error('customer_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email *</label>
                            <input type="email" name="customer_email" required 
                                value="{{ auth()->check() ? auth()->user()->email : old('customer_email') }}"
                                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary-color">
                            @error('customer_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Số điện thoại *</label>
                            <input type="tel" name="customer_phone" required 
                                value="{{ auth()->check() ? auth()->user()->phone : old('customer_phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary-color">
                            @error('customer_phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Địa chỉ giao hàng *</label>
                            <textarea name="customer_address" required rows="3"
                                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary-color">{{ old('customer_address') }}</textarea>
                            @error('customer_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Ghi chú</label>
                            <textarea name="notes" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary-color"
                                placeholder="Ghi chú thêm cho đơn hàng (tùy chọn)">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Method -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Phương thức thanh toán</h2>
                    
                    <div class="space-y-3">
                        <label class="flex items-center p-4 border border-gray-300 cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="cash" checked class="mr-3">
                            <div>
                                <div class="font-semibold">Thanh toán khi nhận hàng</div>
                                <div class="text-sm text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="card" class="mr-3">
                            <div>
                                <div class="font-semibold">Thanh toán bằng thẻ</div>
                                <div class="text-sm text-gray-600">Thanh toán bằng thẻ tín dụng/ghi nợ</div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="online" class="mr-3">
                            <div>
                                <div class="font-semibold">Chuyển khoản ngân hàng</div>
                                <div class="text-sm text-gray-600">Chuyển khoản trực tuyến</div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-md sticky top-32">
                    <h2 class="text-2xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Đơn hàng</h2>
                    
                    <div class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach($cart as $item)
                            @php
                                $itemTotal = $item['price'] * $item['quantity'];
                                $subtotal += $itemTotal;
                            @endphp
                            <div class="flex gap-3 pb-4 border-b">
                                <img src="{{ $item['image_url'] ?? '/images/default-food.jpg' }}" 
                                     alt="{{ $item['name'] }}" 
                                     class="w-16 h-16 object-cover rounded">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-sm">{{ $item['name'] }}</h4>
                                    <p class="text-sm text-gray-600">{{ number_format($item['price'], 0, ',', '.') }} đ x {{ $item['quantity'] }}</p>
                                    <p class="text-primary-color font-semibold">{{ number_format($itemTotal, 0, ',', '.') }} đ</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    @php
                        $tax = $subtotal * 0.1;
                        $total = $subtotal + $tax;
                    @endphp
                    
                    <div class="space-y-2 mb-6 pt-4 border-t">
                        <div class="flex justify-between text-gray-600">
                            <span>Tạm tính:</span>
                            <span>{{ number_format($subtotal, 0, ',', '.') }} đ</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Thuế (10%):</span>
                            <span>{{ number_format($tax, 0, ',', '.') }} đ</span>
                        </div>
                        <div class="flex justify-between text-xl font-bold pt-2 border-t">
                            <span>Tổng cộng:</span>
                            <span class="text-primary-color">{{ number_format($total, 0, ',', '.') }} đ</span>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full btn-primary rounded-none py-4">
                        <i class="fas fa-check-circle mr-2"></i>
                        Đặt hàng
                    </button>
                    
                    <a href="{{ route('menu') }}" class="block text-center mt-4 text-gray-600 hover:text-primary-color">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Tiếp tục mua hàng
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

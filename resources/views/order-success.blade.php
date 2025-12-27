@extends('layouts.frontend')

@section('title', 'Đặt hàng thành công - Santuy Restaurant')

@section('content')
<div class="pt-32 pb-16 min-h-screen" style="background: var(--cream-color);">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <div class="mb-6">
                <i class="fas fa-check-circle text-6xl text-green-500"></i>
            </div>
            
            <h1 class="section-title mb-4">Đặt hàng thành công!</h1>
            
            <p class="text-xl text-gray-600 mb-8">
                Cảm ơn bạn đã đặt hàng tại Santuy Restaurant
            </p>
            
            <div class="bg-gray-50 p-6 rounded-lg mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                    <div>
                        <p class="text-gray-600 mb-1">Mã đơn hàng:</p>
                        <p class="text-xl font-bold text-primary-color">{{ $order->order_number }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-1">Tổng tiền:</p>
                        <p class="text-xl font-bold">{{ number_format($order->total, 0, ',', '.') }} đ</p>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-1">Trạng thái thanh toán:</p>
                        <p class="font-semibold text-yellow-600">
                            @if($order->payment_status === 'pending')
                                Chờ thanh toán
                            @elseif($order->payment_status === 'paid')
                                Đã thanh toán
                            @else
                                Thất bại
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-1">Phương thức thanh toán:</p>
                        <p class="font-semibold">
                            @if($order->payment_method === 'cash')
                                Thanh toán khi nhận hàng
                            @elseif($order->payment_method === 'card')
                                Thanh toán bằng thẻ
                            @else
                                Chuyển khoản
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="bg-blue-50 border border-blue-200 p-6 rounded-lg mb-8 text-left">
                <h3 class="text-xl font-bold mb-4" style="font-family: 'Cormorant', serif;">
                    <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                    Thông tin quan trọng
                </h3>
                <ul class="space-y-2 text-gray-700">
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Email xác nhận đã được gửi đến: <strong>{{ $order->customer_email }}</strong></li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Đơn hàng sẽ được xử lý trong vòng 24h</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Bạn sẽ nhận được thông báo khi đơn hàng được giao</li>
                </ul>
            </div>
            
            <div class="border-t pt-6">
                <h3 class="text-2xl font-bold mb-6" style="font-family: 'Cormorant', serif;">Chi tiết đơn hàng</h3>
                
                <div class="space-y-4 mb-6">
                    @foreach($order->items as $item)
                        <div class="flex gap-4 p-4 bg-gray-50 rounded-lg text-left">
                            <div class="flex-1">
                                <h4 class="font-semibold">{{ $item->menu_name }}</h4>
                                <p class="text-gray-600">{{ number_format($item->menu_price, 0, ',', '.') }} đ x {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-primary-color">{{ number_format($item->subtotal, 0, ',', '.') }} đ</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="border-t pt-4 text-left max-w-md ml-auto">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Tạm tính:</span>
                        <span>{{ number_format($order->subtotal, 0, ',', '.') }} đ</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Thuế:</span>
                        <span>{{ number_format($order->tax, 0, ',', '.') }} đ</span>
                    </div>
                    <div class="flex justify-between text-xl font-bold border-t pt-2">
                        <span>Tổng cộng:</span>
                        <span class="text-primary-color">{{ number_format($order->total, 0, ',', '.') }} đ</span>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                <a href="{{ route('menu') }}" class="btn-primary rounded-none inline-block">
                    <i class="fas fa-shopping-bag mr-2"></i>
                    Tiếp tục mua hàng
                </a>
                <a href="/" class="px-8 py-4 border border-gray-300 hover:bg-gray-50 transition inline-block">
                    <i class="fas fa-home mr-2"></i>
                    Về trang chủ
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

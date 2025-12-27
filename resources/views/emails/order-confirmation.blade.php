<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #C7A17A;
        }
        .header h1 {
            color: #C7A17A;
            margin: 0;
            font-size: 32px;
        }
        .content {
            padding: 20px 0;
        }
        .order-info {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .order-info table {
            width: 100%;
        }
        .order-info td {
            padding: 8px 0;
        }
        .order-items {
            margin: 20px 0;
        }
        .item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
        }
        .item:last-child {
            border-bottom: none;
        }
        .totals {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #eee;
        }
        .totals table {
            width: 100%;
            margin-left: auto;
            max-width: 300px;
            float: right;
        }
        .totals td {
            padding: 8px 0;
        }
        .total-row {
            font-weight: bold;
            font-size: 18px;
            color: #C7A17A;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #C7A17A;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .highlight {
            color: #C7A17A;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Santuy Restaurant</h1>
            <p>Xác nhận đơn hàng</p>
        </div>
        
        <div class="content">
            <p>Xin chào <strong>{{ $order->customer_name }}</strong>,</p>
            
            <p>Cảm ơn bạn đã đặt hàng tại Santuy Restaurant. Đơn hàng của bạn đã được tiếp nhận và đang được xử lý.</p>
            
            <div class="order-info">
                <table>
                    <tr>
                        <td><strong>Mã đơn hàng:</strong></td>
                        <td class="highlight">{{ $order->order_number }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày đặt:</strong></td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Trạng thái:</strong></td>
                        <td>
                            @if($order->order_status === 'pending')
                                Đang xử lý
                            @elseif($order->order_status === 'processing')
                                Đang chuẩn bị
                            @elseif($order->order_status === 'completed')
                                Hoàn thành
                            @else
                                Đã hủy
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Phương thức thanh toán:</strong></td>
                        <td>
                            @if($order->payment_method === 'cash')
                                Thanh toán khi nhận hàng
                            @elseif($order->payment_method === 'card')
                                Thanh toán bằng thẻ
                            @else
                                Chuyển khoản
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            
            <h3>Chi tiết đơn hàng</h3>
            <div class="order-items">
                @foreach($order->items as $item)
                    <div class="item">
                        <div>
                            <strong>{{ $item->menu_name }}</strong><br>
                            <span style="color: #666;">{{ number_format($item->menu_price, 0, ',', '.') }} đ x {{ $item->quantity }}</span>
                        </div>
                        <div>
                            <strong>{{ number_format($item->subtotal, 0, ',', '.') }} đ</strong>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="totals">
                <table>
                    <tr>
                        <td>Tạm tính:</td>
                        <td style="text-align: right;">{{ number_format($order->subtotal, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr>
                        <td>Thuế (10%):</td>
                        <td style="text-align: right;">{{ number_format($order->tax, 0, ',', '.') }} đ</td>
                    </tr>
                    <tr class="total-row">
                        <td>Tổng cộng:</td>
                        <td style="text-align: right;">{{ number_format($order->total, 0, ',', '.') }} đ</td>
                    </tr>
                </table>
                <div style="clear: both;"></div>
            </div>
            
            <div style="margin-top: 30px; padding: 15px; background: #f0f8ff; border-left: 4px solid #C7A17A; border-radius: 4px;">
                <strong>Thông tin giao hàng:</strong><br>
                {{ $order->customer_name }}<br>
                {{ $order->customer_phone }}<br>
                {{ $order->customer_address }}
            </div>
            
            @if($order->notes)
            <div style="margin-top: 15px; padding: 15px; background: #fffbf0; border-left: 4px solid #ffa500; border-radius: 4px;">
                <strong>Ghi chú:</strong><br>
                {{ $order->notes }}
            </div>
            @endif
            
            <p style="margin-top: 30px;">Chúng tôi sẽ liên hệ với bạn sớm để xác nhận và giao hàng. Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi.</p>
        </div>
        
        <div class="footer">
            <p><strong>Santuy Restaurant</strong></p>
            <p>123 Restaurant St, Ho Chi Minh City, Vietnam</p>
            <p>Điện thoại: +84 123 456 789 | Email: info@santuy.com</p>
            <p style="margin-top: 20px; font-size: 12px; color: #999;">
                Email này được gửi tự động. Vui lòng không trả lời email này.
            </p>
        </div>
    </div>
</body>
</html>

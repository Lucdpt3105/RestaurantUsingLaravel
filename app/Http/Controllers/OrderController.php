<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('menu')->with('error', 'Giỏ hàng của bạn đang trống');
        }
        
        return view('checkout', ['cart' => $cart]);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'payment_method' => 'required|in:cash,card,online',
            'notes' => 'nullable|string',
        ]);
        
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return back()->with('error', 'Giỏ hàng của bạn đang trống');
        }
        
        try {
            DB::beginTransaction();
            
            // Calculate totals
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            
            $tax = $subtotal * 0.1; // 10% tax
            $total = $subtotal + $tax;
            
            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'customer_address' => $validated['customer_address'],
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'payment_method' => $validated['payment_method'],
                'payment_status' => 'pending',
                'order_status' => 'pending',
                'notes' => $validated['notes'] ?? null,
            ]);
            
            // Create order items
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['id'],
                    'menu_name' => $item['name'],
                    'menu_price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }
            
            DB::commit();
            
            // Clear cart
            Session::forget('cart');
            
            // Send confirmation email
            $this->sendOrderConfirmationEmail($order);
            
            return redirect()->route('order.success', ['order' => $order->order_number])
                ->with('success', 'Đặt hàng thành công! Mã đơn hàng: ' . $order->order_number);
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại.');
        }
    }
    
    public function success($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->with('items')
            ->firstOrFail();
            
        return view('order-success', compact('order'));
    }
    
    private function sendOrderConfirmationEmail($order)
    {
        try {
            Mail::send('emails.order-confirmation', ['order' => $order], function ($message) use ($order) {
                $message->to($order->customer_email, $order->customer_name)
                    ->subject('Xác nhận đơn hàng #' . $order->order_number);
            });
        } catch (\Exception $e) {
            // Log error but don't stop the order process
            \Log::error('Failed to send order confirmation email: ' . $e->getMessage());
        }
    }
}

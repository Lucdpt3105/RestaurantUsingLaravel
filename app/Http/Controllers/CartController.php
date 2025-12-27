<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $menu = Menu::findOrFail($request->menu_id);
        
        $cart = Session::get('cart', []);
        
        $itemKey = $menu->id;
        
        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] += $request->quantity ?? 1;
        } else {
            $cart[$itemKey] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => $request->quantity ?? 1,
                'image_url' => $menu->image_url,
            ];
        }
        
        Session::put('cart', $cart);
        
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm vào giỏ hàng',
            'cartCount' => count($cart),
        ]);
    }
    
    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $itemKey = $request->item_id;
        
        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] = max(1, $request->quantity);
            Session::put('cart', $cart);
        }
        
        return response()->json([
            'success' => true,
            'cartData' => $this->getCartData(),
        ]);
    }
    
    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);
        $itemKey = $request->item_id;
        
        if (isset($cart[$itemKey])) {
            unset($cart[$itemKey]);
            Session::put('cart', $cart);
        }
        
        return response()->json([
            'success' => true,
            'cartData' => $this->getCartData(),
        ]);
    }
    
    public function clear()
    {
        Session::forget('cart');
        
        return response()->json([
            'success' => true,
            'message' => 'Giỏ hàng đã được xóa',
        ]);
    }
    
    public function get()
    {
        return response()->json([
            'success' => true,
            'cartData' => $this->getCartData(),
        ]);
    }
    
    private function getCartData()
    {
        $cart = Session::get('cart', []);
        $subtotal = 0;
        
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $tax = $subtotal * 0.1; // 10% tax
        $total = $subtotal + $tax;
        
        return [
            'items' => array_values($cart),
            'count' => count($cart),
            'subtotal' => number_format($subtotal, 2, '.', ''),
            'tax' => number_format($tax, 2, '.', ''),
            'total' => number_format($total, 2, '.', ''),
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $menus = Menu::all();

        if ($users->isEmpty() || $menus->isEmpty()) {
            $this->command->warn('Please run UserSeeder and MenuSeeder first!');
            return;
        }

        $paymentMethods = ['cash', 'card', 'online'];
        $paymentStatuses = ['pending', 'paid'];
        $orderStatuses = ['pending', 'processing', 'completed', 'cancelled'];

        // Create 15 sample orders
        for ($i = 1; $i <= 15; $i++) {
            $user = $users->random();
            $paymentStatus = $paymentStatuses[array_rand($paymentStatuses)];
            $orderStatus = $orderStatuses[array_rand($orderStatuses)];
            
            // Calculate totals
            $itemsCount = rand(2, 5);
            $subtotal = 0;
            $orderItems = [];
            
            for ($j = 0; $j < $itemsCount; $j++) {
                $menu = $menus->random();
                $quantity = rand(1, 3);
                $itemSubtotal = $menu->price * $quantity;
                $subtotal += $itemSubtotal;
                
                $orderItems[] = [
                    'menu_id' => $menu->id,
                    'menu_name' => $menu->name,
                    'menu_price' => $menu->price,
                    'quantity' => $quantity,
                    'subtotal' => $itemSubtotal,
                ];
            }
            
            $tax = $subtotal * 0.1;
            $total = $subtotal + $tax;
            
            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'customer_phone' => $user->phone,
                'customer_address' => fake()->address(),
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'payment_status' => $paymentStatus,
                'order_status' => $orderStatus,
                'notes' => rand(0, 1) ? fake()->sentence() : null,
                'created_at' => now()->subDays(rand(0, 30)),
            ]);
            
            // Create order items
            foreach ($orderItems as $item) {
                OrderItem::create(array_merge($item, [
                    'order_id' => $order->id,
                    'created_at' => $order->created_at,
                ]));
            }
        }

        $this->command->info('Orders seeded successfully!');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        $notifications = [
            [
                'type' => 'order',
                'title' => 'New Order Received',
                'content' => 'You have received a new order. Order ID: #ORD-1001. Please check the order details.',
                'return_url' => '/dashboard/orders',
                'read_at' => null,
            ],
            [
                'type' => 'order',
                'title' => 'Order Status Updated',
                'content' => 'Order #ORD-1002 has been successfully delivered.',
                'return_url' => '/dashboard/orders',
                'read_at' => now(),
            ],
            [
                'type' => 'user',
                'title' => 'New Customer Registered',
                'content' => 'A new customer named Rahim Ahmed has registered on your website.',
                'return_url' => '/dashboard/users',
                'read_at' => null,
            ],
            [
                'type' => 'message',
                'title' => 'New Customer Message',
                'content' => 'You have received a new message from a customer regarding a product.',
                'return_url' => '/dashboard/messages',
                'read_at' => now(),
            ],
            [
                'type' => 'product',
                'title' => 'Low Stock Alert',
                'content' => 'Your product T-Shirt Black (SKU: TS-001) has only 3 items remaining in stock.',
                'return_url' => '/dashboard/products',
                'read_at' => null,
            ],
            [
                'type' => 'payment',
                'title' => 'Payment Received',
                'content' => 'Payment of BDT 1,500 has been received successfully through bKash.',
                'return_url' => '/dashboard/orders',
                'read_at' => now(),
            ],
            [
                'type' => 'product',
                'title' => 'New Product Published',
                'content' => 'Your new product Premium Cotton Shirt has been published successfully.',
                'return_url' => '/dashboard/products',
                'read_at' => null,
            ],
            [
                'type' => 'payment',
                'title' => 'Payment Failed',
                'content' => 'Payment for order #ORD-1005 has failed. Please check the payment details.',
                'return_url' => '/dashboard/orders',
                'read_at' => null,
            ],
        ];

        foreach ($notifications as $notification) {
            Notification::create(array_merge(
                $notification,
                ['user_id' => 2]
            ));
        }
    }
}

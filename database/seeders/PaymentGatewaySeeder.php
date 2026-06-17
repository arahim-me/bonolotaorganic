<?php

namespace Database\Seeders;

use App\Models\PaymentGwateway;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create payment methods
        $methods = [
            [
                'name' => 'Bkash',
                'type' => 1,
                'logo' => 'bkash.png', // Assuming you have a logo file in public/storage/payment_logos
                'status_id' => 2, // Inactive by default
            ],
            [
                'name' => 'Rocket',
                'type' => 1,
                'logo' => 'rocket.png', // Assuming you have a logo file in public/storage/payment_logos
                'status_id' => 2, // Inactive by default
            ],
            [
                'name' => 'Nagad',
                'type' => 1,
                'logo' => 'nagad.png', // Assuming you have a logo file in public/storage/payment_logos
                'status_id' => 2, // Inactive by default
            ],
            [
                'name' => 'Cash on Delivery',
                'type' => 2,
                'logo' => 'cash-on-delivery.png', // Assuming you have a logo file in public/storage/payment_logos
                'status_id' => 1, // Active by default
            ]
        ];

        $gateways = PaymentMethod::where('type', 1)->get();
        foreach ($gateways as $gateway) {
            PaymentGwateway::create([
                'provider_id' => $gateway->id,
                'api_key' => 'your_api_key_here',
                'api_secret' => 'your_api_secret_here',
                'username' => 'your_client_id_here',
                'password' => 'your_client_secret_here',
                'base_url' => 'your_base_url_here',
                'success_url' => 'your_success_url_here',
                'cancel_url' => 'your_cancel_url_here',
                'prefix' => 'your_prefix_here',
                'merchant_number' => 'your_merchant_number_here',
                'merchant_name' => 'your_merchant_name_here',
                'merchant_id' => 'your_merchant_id_here',
                'mode' => 'live',
                'status_id' => 2,
            ]);
        }

        // foreach ($gateways as $gateway) {
        //     PaymentMethod::create([
        //         'provider' => $gateway['provider'],
        //         'provider_logo' => $gateway['provider_logo'],
        //         'status_id' => $gateway['status_id'],
        //     ]);
        // }
        foreach ($methods as $method) {
            PaymentMethod::create([
                'name' => $method['name'],
                'type' => $method['type'],
                'logo' => $method['logo'],
                'status_id' => $method['status_id'],
            ]);
        }
    }
}

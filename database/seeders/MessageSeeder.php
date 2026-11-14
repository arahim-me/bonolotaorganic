<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed the messages table with some sample data
        $messages = [
            [
                'sender_id' => 6,
                'title' => 'Inquiry about product',
                'message' => 'I have a question about the product specifications.'
            ],
            [
                'email' => 'jane.smith@example.com',
                'phone' => '098-765-4321',
                'name' => 'Karim',
                'title' => 'Feedback about purchase',
                'message' => 'I had a great experience with my recent purchase.'
            ],
            [
                'sender_id' => 6,
                'title' => 'Product return request',
                'message' => 'I would like to return this item.'
            ],
            [
                'email' => 'janesmith@example.com',
                'phone' => '098-765-4321',
                'name' => 'Imran',
                'title' => 'Product inquiry',
                'message' => 'I would like more information about this product.'
            ],
            [
                'sender_id' => 6,
                'title' => 'Product feedback',
                'message' => 'I have some feedback about the product.'
            ]

        ];
        foreach ($messages as $message) {
            \App\Models\Message::create($message);
        }
    }
}

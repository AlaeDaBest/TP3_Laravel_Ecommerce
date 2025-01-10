<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([ 
            [ 
            'customer_id' => 1, 
            'amount' => 499,  
            'shipping_address' => '123 Main Street, Cityville', 
            'order_adress' => '123 Main Street, Cityville', 
            'order_email' => 'john.doe@example.com', 
            'order_date' => now(), 
            'order_status' => 'Processing', 
            'created_at' => now(), 
            'updated_at' => now() 
            ],
            [ 
            'customer_id' => 2, 
            'amount' => 299,  
            'shipping_address' => '456 Oak Avenue, Townsville', 
            'order_adress' => '456 Oak Avenue, Townsville', 
            'order_email' => 'jane.smith@example.com', 
            'order_date' => now(), 
            'order_status' => 'Delivered', 
            'created_at' => now(), 
            'updated_at' => now() 
            ],
            [ 
            'customer_id' => 3, 
            'amount' => 159, 
            'shipping_address' => '789 Pine Road, Hamlet', 
            'order_adress' => '789 Pine Road, Hamlet', 
            'order_email' => 'emily.jones@example.com', 
            'order_date' => now(),
            'order_status' => 'Delivered', 
            'created_at' => now(), 
            'updated_at' => now() 
            ] 
        ]);
    }
}

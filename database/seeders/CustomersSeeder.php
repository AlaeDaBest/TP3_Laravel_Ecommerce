<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([ 
            [ 
            'email' => 'john.doe@example.com', 
            'password' => 'password111', 
            'full_name' => 'John Doe', 
            'billing_address' => '123 Main Street, Cityville', 
            'default_shipping_address' => '123 Main Street, Cityville', 
            'country' => 'USA', 
            'phone' => '123-456-7890', 
            'created_at' => now(),
            'updated_at' => now() 
            ], 
            [ 'email' => 'jane.smith@example.com', 
            'password' => 'password112',
            'full_name' => 'Jane Smith', 
            'billing_address' => '456 Oak Avenue, Townsville', 
            'default_shipping_address' => '456 Oak Avenue, Townsville', 
            'country' => 'Canada', 
            'phone' => '098-765-4321', 
            'created_at' => now(), 
            'updated_at' => now() 
            ], 
            [
            'email' => 'emily.jones@example.com', 
            'password' => 'password113', 
            'full_name' => 'Emily Jones', 
            'billing_address' => '789 Pine Road, Hamlet', 
            'default_shipping_address' => '789 Pine Road, Hamlet', 
            'country' => 'Australia', 
            'phone' => '567-890-1234', 
            'created_at' => now(), 
            'updated_at' => now()
            ]
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products_options')->insert([ 
            [
            'product_id' => 1, 
            'option_id' => 1, 
            'created_at' => now(), 
            'updated_at' => now()
            ], 
            [
            'product_id' => 1, 
            'option_id' => 2, 
            'created_at' => now(), 
            'updated_at' => now()
            ], 
            ['product_id' => 2, 
            'option_id' => 1, 
            'created_at' => now(), 
            'updated_at' => now()
            ], 
            [
            'product_id' => 3, 
            'option_id' => 3, 
            'created_at' => now(), 
            'updated_at' => now()
            ]
        ]);
    }
}

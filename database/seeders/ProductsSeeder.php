<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([ 
            [ 
            'sku' => 'PRD001',
            'name' => 'Product A', 
            'price' => 1999, 
            'weight' => 500, 
            'descriptions' => 'Description for Product A', 
            'thumbnail' => 'thumbnail_a.jpg', 
            'image' => 'image_a.jpg', 
            'category' => 'Category 1', 
            'create_date' => now(), 
            'stock' => 90
            ], 
            [ 
            'sku' => 'PRD002', 
            'name' => 'Product B', 
            'price' => 2999, 
            'weight' => 750, 
            'descriptions' => 
            'Description for Product B', 
            'thumbnail' => 'thumbnail_b.jpg', 
            'image' => 'image_b.jpg', 
            'category' => 'Category 2', 
            'create_date' => now(), 
            'stock' => 10
            ], 
            [ 'sku' => 'PRD003', 
            'name' => 'Product C', 
            'price' => 999, 
            'weight' => 250, 
            'descriptions' => 'Description for Product C', 
            'thumbnail' => 'thumbnail_c.jpg', 
            'image' => 'image_c.jpg', 
            'category' => 'Category 3', 
            'create_date' => now(), 
            'stock' => 50
            ]
        ]);
    }
}

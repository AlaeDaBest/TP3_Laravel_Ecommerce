<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([ 
            [ 
            'name' => 'Electronics', 
            'description' => 'Devices and gadgets', 
            'thumbnail' => 'electronics_thumbnail.jpg', 
            'created_at' => now(), 
            'updated_at' => now() 
            ], 
            [ 
            'name' => 'Fashion', 
            'description' => 'Clothing and accessories', 
            'thumbnail' => 'fashion_thumbnail.jpg', 
            'created_at' => now(), 
            'updated_at' => now() 
            ], 
            [ 
            'name' => 'Home & Garden', 
            'description' => 'Furniture and garden supplies', 
            'thumbnail' => 'home_garden_thumbnail.jpg', 
            'created_at' => now(), 
            'updated_at' => now() 
            ], 
            [ 
            'name' => 'Books', 
            'description' => 'Fiction and non-fiction books', 
            'thumbnail' => 'books_thumbnail.jpg', 
            'created_at' => now(), 
            'updated_at' => now() 
            ], 
            [ 
            'name' => 'Beauty', 
            'description' => 'Skincare and makeup', 
            'thumbnail' => 'beauty_thumbnail.jpg', 
            'created_at' => now(), 
            'updated_at' => now() 
            ]
        ]);
    }
}

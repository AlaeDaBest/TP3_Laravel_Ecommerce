<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('options')->insert([ 
            [
            'option_name' => 'Size', 
            'created_at' => now(), 
            'updated_at' => now()
            ], 
            [
            'option_name' => 'Color', 
            'created_at' => now(), 
            'updated_at' => now()
            ],
            [
            'option_name' => 'Material',
            'created_at' => now(), 
            'updated_at' => now()
            ], 
            [
            'option_name' => 'Style', 
            'created_at' => now(), 
            'updated_at' => now()
            ]
        ]);
    }
}

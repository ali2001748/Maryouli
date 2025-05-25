<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Using DB facade

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Men\'s Classic Tee', // Escaped apostrophe
                'description' => 'A comfortable and durable classic t-shirt.',
                'base_price' => 15.99,
                'image_url_front_template' => '/images/templates/men_classic_tee_front.png',
                'image_url_back_template' => '/images/templates/men_classic_tee_back.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Slim Fit Tee', // Escaped apostrophe
                'description' => 'A soft and stylish slim fit t-shirt.',
                'base_price' => 16.50,
                'image_url_front_template' => '/images/templates/women_slim_tee_front.png',
                'image_url_back_template' => '/images/templates/women_slim_tee_back.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Unisex Hoodie',
                'description' => 'A warm and cozy hoodie for all.',
                'base_price' => 35.00,
                'image_url_front_template' => '/images/templates/unisex_hoodie_front.png',
                'image_url_back_template' => '/images/templates/unisex_hoodie_back.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfProducts = 20;

        // Create products with associated existing brands and categories
        Product::factory($numberOfProducts)->create();
    }
}

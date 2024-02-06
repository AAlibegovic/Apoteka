<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Retrieve existing brands and categories
        $brand = Brand::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomDigit(),
            'description' => $this->faker->sentence(),
            'year_of_production' => now(),
            'year_of_expiration' => $this->faker->date(),
            'brand_id' => $brand->id,
            'category_id' => $category->id,
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Predefined categories
        $categories = [
            "Prescription Drugs",
            "Over-the-Counter Medications",
            "Vitamins & Supplements",
            "First Aid",
            "Allergy Relief",
            "Digestive Health",
            "Pain Management",
            "Cold & Flu",
            "Diabetes Care",
            "Respiratory Care",
            "Skin Conditions",
        ];

        foreach ($categories as $categoryName) {
            Category::factory()->create(['name' => $categoryName]); 
        }
    }
}

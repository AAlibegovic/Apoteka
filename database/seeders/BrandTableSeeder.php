<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Predefined brands
        $brandsData = [
            ['Bosnalijek', 'Bosnia and Herzegovina'],
            ['PharmaCare', 'USA'],
            ['GlobalHealth', 'Canada'],
            ['NatureWell', 'Australia'],
            ['EuroMed', 'Germany'],
            ['MediLife', 'India'],
            ['MedicoPharma', 'USA'],
            ['HealthWorld', 'UK'],
            ['BioCare', 'Germany'],
            ['PharmaCorp', 'France'],
            ['NutraVital', 'Spain'],
            ['AsiaPharma', 'Japan'],
        ];

        foreach ($brandsData as $brand) {
            Brand::factory()->create([
                'name' => $brand[0],
                'country' => $brand[1],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

// database/seeders/CustomerTableSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    public function run()
    {
        
        $numberOfCustomers = 10;
        \App\Models\Customer::factory($numberOfCustomers)->create();
    }
}


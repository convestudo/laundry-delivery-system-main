<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryDriver;

class DeliveryDriverSeeder extends Seeder
{
    public function run()
    {
        DeliveryDriver::factory()->count(50)->create(); // Creates 50 dummy drivers
    }
}

<?php

namespace Database\Factories;

use App\Models\DeliveryDriver;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryDriverFactory extends Factory
{
    protected $model = DeliveryDriver::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Generate a user for each driver
            'gender' => $this->faker->randomElement(['male', 'female']),
            'old' => $this->faker->numberBetween(20, 60), // Random age
            'vehicle_type' => $this->faker->randomElement(['car', 'bike', 'van']),
            'plate_number' => strtoupper($this->faker->bothify('???-####')), // Random plate number
        ];
    }
}

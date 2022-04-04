<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_code' => 'N' . now() . mt_rand(1, 10),
            'user_id' => mt_rand(1, 10),
            'driver_id' => 0,
            'waste_collector_id' => 0,
            'date' => $this->faker->date(),
            'total_weight' => mt_rand(1, 50),
            'total_weight_west_collector' => mt_rand(1, 50),
            'total' => mt_rand(10000, 50000),
            'status' => 'success',
            'reason' => '',
        ];
    }
}

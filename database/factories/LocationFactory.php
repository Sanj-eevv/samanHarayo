<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'latitude'          =>          $this->faker->latitude($min = -90, $max = 90),
            'longitude'         =>          $this->faker->longitude($min = -180, $max = 180),
            'address'           =>          $this->faker->address,
            'created_at'        =>          now(),
            'updated_at'        =>          now(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expiry_date'           =>              $this->faker->dateTimeBetween('now', '+3 month'),
            'created_at'            =>              now(),
            'updated_at'            =>              now(),
        ];
    }
}

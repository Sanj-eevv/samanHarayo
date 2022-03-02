<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RewardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'reward_amount'         =>              $this->faker->randomFloat(2, 100, 5000),
                'owned_by'              =>              null,
                'created_at'            =>              now(),
                'updated_at'            =>              now(),
        ];
    }
}
